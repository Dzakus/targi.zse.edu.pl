 <div class="container-fluid">
      <div class="row-fluid">
        <div class="span3">
          <div class="well sidebar-nav">
            <ul class="nav nav-list">
              <li class="nav-header">Nawigacja</li>
              <li <?php 
              if(isset($_GET["page"]) && $_GET["page"]==0){
                echo 'class="active"';
              }elseif (!isset($_GET["page"])) {
                echo 'class="active"';
              } ?>><a href="?page=0">Strona główna</a></li>
              <li <?php if(isset($_GET["page"]) && $_GET["page"]==1)echo 'class="active"'; ?>><a href="?page=1">Wybór szkoły</a></li>
              <li <?php if(isset($_GET["page"]) && $_GET["page"]==2)echo 'class="active"'; ?>><a href="?page=2">Prezentacje szkół</a></li>
                <li <?php if(isset($_GET["page"]) && $_GET["page"]==3)echo 'class="active"'; ?>><a href="?page=3">Strony WWW</a></li>
                <li <?php if(isset($_GET["page"]) && $_GET["page"]==4)echo 'class="active"'; ?>><a href="?page=4">Serwis informacyjny</a></li>
              </ul>
          </div><!--/.well -->
        </div><!--/span-->