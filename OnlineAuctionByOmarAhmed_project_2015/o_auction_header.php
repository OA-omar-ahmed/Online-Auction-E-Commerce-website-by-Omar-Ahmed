<style type="text/css">

.OMAR_STYLE__juice_bg #left_container #main_nav blockquote h4 a strong {
	text-align: center;
}






#postauc{list-style: none;  }
#postauc li a{  dispay: block;  background-color:#070e39; padding: 12px; color:#FFF; text-decoration:none; border: 1px inset #FFF;  }
#postauc li a:hover{  dispay: block; background-color:#0d164e;padding: 12px;  }


#home_btn{list-style: none;  }
#home_btn li{ float: left; }
#home_btn  li a{  dispay: block; background-image:url(../admin/images/omar_auc_logo.png); padding: 20px 28px 14px 40px; margin:auto color:#FFF; text-decoration:none; border: 2px inset #333d74;  }
#home_btn li a:hover{ background-image:url(../admin/images/omar_auc_logo.png); font-size:18px;  }




#navbar ul{list-style: none;  }
#navbar ul li{ float: left; border: 2px inset #FFF; }
#navbar ul li a{  dispay: block;  background-color:#070e39; padding: 12px; color:#FFF; text-decoration:none;   border: 2px ridge #FFF ; }
#navbar ul li a:hover{ background: #333d74; font-size:15px;  }



#logoutok ul{list-style: none;  }
#logoutok li{ list-style: none; float: right;}
#logoutok li a{  dispay: block;  background-color: #333d74; padding: 12px; color: #FFF; text-decoration:none;   border: 2px dotted #FFF  }
#logoutok li a:hover{ background: #333d74; font-size:16px; border: 2px dotted #222222;  }



</style>






 <div id="logoutok">
                  
                  <li> <a href="logout_page.php">   Logout </a> </li>
                  
                  </div>

 <div id="row">

 <div id="home_btn">
                 

              <li> <a href="personal_page.php"><?php echo $row_info['user_f_name']; ?>  <?php echo $row_info['user_l_name']; ?>  ( <?php echo $_SESSION['SESSION_Username']; ?> ) </a> </li>   
          </div>

   <div id="navbar">



                <ul>

                  



                  <li><a href="watch_prod.php"> Watch     </a></li>

<li><a href="personalPageBuy.php?Id=<?php echo $row_Recordset1['bids_user_id']; ?>">   My Items willing to Buy Page   </a></li>
<li><a href="personalPageSell.php">    My Items willing to Sell Page </a></li>
                </ul>

                    
          </div>
                  </div>
      
        <div id="postauc">
<li><a href="add_item_to_sell.php">   Post an Auction   </a> </li>

</div>
                  
                 
                 <br>
           
 

 
      