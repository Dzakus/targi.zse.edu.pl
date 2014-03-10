<?php
ob_start();
class PHPCount
{
   /*
    * Defines how many seconds a hit should be rememberd for. This prevents the
    * database from perpetually increasing in size. Thirty days (the default)
    * works well. If someone visits a page and comes back in a month, it will be
    * counted as another unique hit.
    */
    const HIT_OLD_AFTER_SECONDS = 3600; // default: 30 days.

    // Don't count hits from search robots and crawlers.
    const IGNORE_SEARCH_BOTS = true;

    // Don't count the hit if the browser sends the DNT: 1 header.
    const HONOR_DO_NOT_TRACK = false;

    private static $IP_IGNORE_LIST = array(
        '127.0.0.1',
    );

    private static $DB = false;

    private static function InitDB()
    {
        if(self::$DB)
            return;

        try
        {
            require 'dbConn.php';
            // TODO: Set the database login credentials.
            self::$DB = $pdo;
        }
        catch(Exception $e)
        {
            die('Failed to connect to phpcount database');
        }
    }

    /*
     * Adds a hit to a page specified by a unique $pageID string.
     */
    public static function AddHit($sqlID)
    {
        if(self::IGNORE_SEARCH_BOTS && self::IsSearchBot())
            return false;
        if(in_array($_SERVER['REMOTE_ADDR'], self::$IP_IGNORE_LIST))
            return false;
        if(
            self::HONOR_DO_NOT_TRACK &&
            isset($_SERVER['HTTP_DNT']) && $_SERVER['HTTP_DNT'] == "1"
        ) {
            return false;
        }

        self::InitDB();
        if(self::UniqueHit($sqlID))
        {
            self::CountHit($sqlID);
            setcookie('hit'.$sqlID, sha1("Chyba Ty"), time()+self::HIT_OLD_AFTER_SECONDS);
        }

        return true;
    }
    

    /*
     * Returns (int) the amount of hits a page has
     * $pageID - the page identifier
     * $unique - true if you want unique hit count
     */
    public static function GetHits($sqlID)
    {
        self::InitDB();

        $q = self::$DB->prepare(
            'SELECT views FROM szkoly
             WHERE id = :sqlid'
        );
        $q->bindParam(':sqlid', $sqlID);
        $q->execute();

        if(($res = $q->fetch()) !== FALSE)
        {
            return (int)$res['views'];
        }
        else
        {
            die("Missing hit count from database!");
            return false;
        }
    }
    
    /*====================== PRIVATE METHODS =============================*/
    
    private static function IsSearchBot()
    {
        // Of course, this is not perfect, but it at least catches the major
        // search engines that index most often.
        $keywords = array(
            'bot',
            'spider',
            'spyder',
            'crawlwer',
            'walker',
            'search',
            'yahoo',
            'holmes',
            'htdig',
            'archive',
            'tineye',
            'yacy',
            'yeti',
        );

        $agent = strtolower($_SERVER['HTTP_USER_AGENT']);

        foreach($keywords as $keyword) 
        {
            if(strpos($agent, $keyword) !== false)
                return true;
        }

        return false;
    }

    private static function UniqueHit($sqlID)
    {
        if(isset($_COOKIE["hit".$sqlID])){
            return false;
        }else{
            return true;
        }
    }
    
    private static function CountHit($sqlID)
    {
        $q = self::$DB->prepare(
            'UPDATE szkoly SET views = views + 1 WHERE id = :sqlid'
        );
        $q->bindParam(':sqlid', $sqlID);
        $q->execute();
    }
}
