<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>knOWLedge Loja Online</title>
<link href="css/default.css" rel="stylesheet" type="text/css" media="screen" />
<script>var __adobewebfontsappname__="dreamweaver"</script><script src="http://use.edgefonts.net/aclonica:n4:default.js" type="text/javascript"></script>
<body>
<?php include "PHP/connect.php"; ?>

<body>
<div id="header">
  <div id="logo">
    <h1><a href="#">Knowledge</a></h1>
    <p>Loja online</p>
  </div>
  <div id="menu-bg">
  <div id="menu">
    <ul id="main">
		<li><a href="index.html">Homepage</a></li>
		<li class="current_page_item"><a href="procurar.html">Procurar Livro</a></li>
	    <li><a href="procurarA.html">Procurar Autor </a></li>
		<li><a href="encomendar.html">Encomendar</a></li>
		<li><a href="aboutUs.html">About Us</a></li>
		<li><a href="contact.html">Contact Us</a></li>
		<li><a href="perfil.html">Perfil</a></li>
		<li><a href="admin.html">Funções Admin </a></li>
		
    </ul>

  </div>
  </div>
</div>

<div id="wrapper">
  <!-- start page -->
  <div id="page">
    <!-- start content -->
    <div id="content">
      <div class="post">
        <?php

  $cursor = oci_new_cursor($conn);
  $stmt = oci_parse ($conn, "begin P_LIVRO.selByNome(:p_liv_nome, :error, :errorMsg, :result); end;");
  oci_bind_by_name($stmt,":p_liv_nome",$_REQUEST["p_liv_nome"]);
  oci_bind_by_name($stmt,":error",$error,3);
  oci_bind_by_name($stmt,":errorMsg",$errorMsg,512);
  oci_bind_by_name($stmt,":result",$cursor,-1,OCI_B_CURSOR);
  oci_execute($stmt);
  
  if ($error != 0) {
    echo "<h2 class=\"erro\">Erro: $errorMsg</h2>";
  }
  else {
    echo "
<table> 
<tr>
<th>Nome</th>
<th>Preco</th>
<th>Idioma</th>
<th>&nbsp;</th>
</tr>";

    oci_execute($cursor);
	while ($result = oci_fetch_object($cursor)) {
	  echo "
<tr>
<td>$result->LIV_NOME</td>
<td>$result->LIV_PRECO</td>
<td>$result->LIV_IDIOMA</td>
</tr>";
	}
	echo 
"</table>";
  }
  oci_free_statement($stmt);
  oci_free_cursor($cursor);
  oci_close($conn);
?>
        <div class="entry">
          <p class="links"><a href="#" class="more">Voltar ao início</a> &nbsp;&nbsp;&nbsp;</p>
        </div>
      </div>
 
      </div>
   
      </div>
    </div>
    <!-- start sidebars -->
     <div id="sidebar1" class="sidebar">
      <ul>
        <li>
          <h2>Livro mais pesquisado</h2>
          <ul>
            <li><a href="#"> Java for dummies </a></li>
          </ul>
        </li>
        <li>
          <h2>Autor mais pequisado</h2>
          <ul>
            <li><a href="#"> Maria Maquiavel </a></li>

          </ul>
        </li>
        <li>
          <h2>Livros mais vendidos</h2>
          <ul>
            <li><a href="#"> Crime Scene </a></li>

          </ul>
        </li>
        <li></li>
      </ul>
    </div>
    <div id="sidebar2" class="sidebar">
      <ul>
        <li>
          <label for="textfield2">Username:</label>
          <input type="text" name="textfield" id="textfield2" />
          <label for="password">Password:</label>
          <input type="password" name="password" id="password" />
          <input type="submit" name="submit" id="submit" value="Submit" />
          <form id="searchform" method="get" action="#">
            <div></div>
          </form>
        </li>
        <li>
          <h2><!-- #BeginDate format:fcAm1m --> <script type="text/javascript">
document.write ('<p>Current time is: <span id="date-time">', new Date().toLocaleString(), '<\/span>.<\/p>')
if (document.getElementById) onload = function () {
	setInterval ("document.getElementById ('date-time').firstChild.data = new Date().toLocaleString()", 50)
}
</script> <!-- #EndDate -->
          </h2>
        </li>
      </ul>
    </div>
    <div style="clear: both;">&nbsp;</div>
  </div>
  <!-- end page -->
</div>
<div id="footer">
  <div id="footer-content">
   
  </div>
</div>
</body>
</html>