<?php
require_once("inc/config.php");
require_once("inc/search.php");

//if no GET VAR
if (!isset($_GET['j'])) {
    header('Location: ../journals/');
}
//if GET var, query db
$j = $_GET['j'];
$stmt = $db->prepare("SELECT * FROM journals WHERE journal_name = :j LIMIT 1");
$stmt->bindParam(':j', $j);
$stmt->execute();

$pn = $_GET['pn'];
$stmt1 = $db->prepare("SELECT * FROM publications WHERE pub_name = :pn LIMIT 1");
$stmt1->bindParam(':pn', $pn);
$stmt1->execute();

// if not empty result
$row = $stmt->fetch(PDO::FETCH_ASSOC);
$rowp = $stmt1->fetch(PDO::FETCH_ASSOC);

//
if (is_array($rowp)) {

$stmtx1 = $db->prepare("SELECT * FROM publications WHERE pub_name = '$pn' AND pub_journal = '$j' ");
    $stmtx1->execute();
    $p_n = $rowp['pub_name'];
}


if (is_array($row)) {

    $category = $row['journal_category'];
    $issn = $row['ISSN'];
 

//editorial board
    $stmt_edit = $db->prepare("SELECT * FROM editorials WHERE journal = '$j'");
    $stmt_edit->execute();


//current issues
    $stmt1 = $db->prepare("SELECT * FROM publications WHERE pub_journal = '$j' AND pub_issue = 'CURRENT'");
    $stmt1->execute();
    $row_curr = $stmt1->rowCount();

//current2 file 
    $stmt01 = $db->prepare("SELECT * FROM publications WHERE pub_journal = '$j' AND pub_issue = 'CURRENT'  ");
    $stmt01->execute();
    $row_curr = $stmt01->rowCount();

//current_abstract file 
    $stmt02 = $db->prepare("SELECT * FROM publications WHERE pub_journal = '$j' AND pub_issue = 'CURRENT'");
    $stmt02->execute();
    $row_curr = $stmt02->rowCount();


    $stmtv = $db->prepare("SELECT * FROM publications WHERE pub_journal = '$j' AND pub_issue = 'CURRENT' ORDER BY id DESC");
    $stmtv->execute();


    /*//get number of items in current
    $count1 = $stmt1->fetchAll();
    $count1 = count($count1);
    */
//back issues... v11: vol 1 NO.1, v23: VOL. 2 no 3
    $stmtv1 = $db->prepare("SELECT * FROM publications WHERE pub_journal = '$j' AND pub_issue = 'BACK' AND (pub_volume LIKE 'VOL. 1%' OR pub_volume LIKE 'VOL 1')");
    $stmtv1->execute();
    $pathv1 = "get/" . $j . "/VOL 1/";
    $row_v1 = $stmtv1->rowCount();

    $stmtv21 = $db->prepare("SELECT * FROM publications WHERE pub_journal = '$j' AND pub_issue = 'BACK' AND pub_volume LIKE 'VOL. 2 NO. 1%'");
    $stmtv21->execute();
    $pathv21 = "get/" . $j . "/VOL. 2 NO. 1 2016/";
    $row_v21 = $stmtv21->rowCount();

    $stmtv22 = $db->prepare("SELECT * FROM publications WHERE pub_journal = '$j' AND pub_issue = 'BACK' AND pub_volume LIKE 'VOL. 2 NO. 2 %'");
    $stmtv22->execute();
    $pathv22 = "get/" . $j . "/VOL. 2 NO. 2 2016/";
    $row_v22 = $stmtv22->rowCount();

    $stmtv23 = $db->prepare("SELECT * FROM publications WHERE pub_journal = '$j' AND pub_issue = 'BACK' AND pub_volume LIKE 'VOL. 2 NO. 3 %'");
    $stmtv23->execute();
    $pathv23 = "get/" . $j . "/VOL. 2 NO. 3 2016/";
    $row_v23 = $stmtv23->rowCount();

    $stmtv24 = $db->prepare("SELECT * FROM publications WHERE pub_journal = '$j' AND pub_issue = 'BACK' AND pub_volume LIKE 'VOL. 2 NO. 4 %'");
    $stmtv24->execute();
    $pathv24 = "get/" . $j . "/VOL. 2 NO. 4 2016/";
    $row_v24 = $stmtv24->rowCount();

    $stmtv25 = $db->prepare("SELECT * FROM publications WHERE pub_journal = '$j' AND pub_issue = 'BACK' AND pub_volume LIKE 'VOL. 2 NO. 5 %'");
    $stmtv25->execute();
    $pathv25 = "get/" . $j . "/VOL. 2 NO. 5 2016/";
    $row_v25 = $stmtv25->rowCount();

    $stmtv26 = $db->prepare("SELECT * FROM publications WHERE pub_journal = '$j' AND pub_issue = 'BACK' AND pub_volume LIKE 'VOL. 2 NO. 6 %'");
    $stmtv26->execute();
    $pathv26 = "get/" . $j . "/VOL. 2 NO. 6 2016/";
    $row_v26 = $stmtv26->rowCount();

    $stmtv27 = $db->prepare("SELECT * FROM publications WHERE pub_journal = '$j' AND pub_issue = 'BACK' AND pub_volume LIKE 'VOL. 2 NO. 7 %'");
    $stmtv27->execute();
    $pathv27 = "get/" . $j . "/VOL. 2 NO. 7 2016/";
    $row_v27 = $stmtv27->rowCount();

    $stmtv28 = $db->prepare("SELECT * FROM publications WHERE pub_journal = '$j' AND pub_issue = 'BACK' AND pub_volume LIKE 'VOL. 2 NO. 8 %'");
    $stmtv28->execute();
    $pathv28 = "get/" . $j . "/VOL. 2 NO. 8 2016/";
    $row_v28 = $stmtv28->rowCount();

    $stmtv29 = $db->prepare("SELECT * FROM publications WHERE pub_journal = '$j' AND pub_issue = 'BACK' AND pub_volume LIKE 'VOL. 2 NO. 9 %'");
    $stmtv29->execute();
    $pathv29 = "get/" . $j . "/VOL. 2 NO. 9 2016/";
    $row_v29 = $stmtv29->rowCount();

    $stmtv31 = $db->prepare("SELECT * FROM publications WHERE pub_journal = '$j' AND pub_issue = 'BACK' AND pub_volume LIKE 'VOL. 3 NO. 1 %'");
    $stmtv31->execute();
    $pathv31 = "get/" . $j . "/VOL. 3 NO. 1 2017/";
    $row_v31 = $stmtv31->rowCount();

    $stmtv32 = $db->prepare("SELECT * FROM publications WHERE pub_journal = '$j' AND pub_issue = 'BACK' AND pub_volume LIKE 'VOL. 3 NO. 2 %'");
    $stmtv32->execute();
    $pathv32 = "get/" . $j . "/VOL. 3 NO. 2 2017/";
    $row_v32 = $stmtv32->rowCount();

    $stmtv33 = $db->prepare("SELECT * FROM publications WHERE pub_journal = '$j' AND pub_issue = 'BACK' AND pub_volume LIKE 'VOL. 3 NO. 3 %'");
    $stmtv33->execute();
    $pathv33 = "get/" . $j . "/VOL. 3 NO. 3 2017/";
    $row_v33 = $stmtv33->rowCount();

    $stmtv34 = $db->prepare("SELECT * FROM publications WHERE pub_journal = '$j' AND pub_issue = 'BACK' AND pub_volume LIKE 'VOL. 3 NO. 4 %'");
    $stmtv34->execute();
    $pathv34 = "get/" . $j . "/VOL. 3 NO. 4 2017/";
    $row_v34 = $stmtv34->rowCount();

    $stmtv35 = $db->prepare("SELECT * FROM publications WHERE pub_journal = '$j' AND pub_issue = 'BACK' AND pub_volume LIKE 'VOL. 3 NO. 5 %'");
    $stmtv35->execute();
    $pathv35 = "get/" . $j . "/VOL. 3 NO. 5 2017/";
    $row_v35 = $stmtv35->rowCount();

    $stmtv36 = $db->prepare("SELECT * FROM publications WHERE pub_journal = '$j' AND pub_issue = 'BACK' AND pub_volume LIKE 'VOL. 3 NO. 6 %'");
    $stmtv36->execute();
    $pathv36 = "get/" . $j . "/VOL. 3 NO. 6 2017/";
    $row_v36 = $stmtv36->rowCount();

    $stmtv37 = $db->prepare("SELECT * FROM publications WHERE pub_journal = '$j' AND pub_issue = 'BACK' AND pub_volume LIKE 'VOL. 3 NO. 7 %'");
    $stmtv37->execute();
    $pathv37 = "get/" . $j . "/VOL. 3 NO. 7 2017/";
    $row_v37 = $stmtv37->rowCount();

    $stmtv38 = $db->prepare("SELECT * FROM publications WHERE pub_journal = '$j' AND pub_issue = 'BACK' AND pub_volume LIKE 'VOL. 3 NO. 8 %'");
    $stmtv38->execute();
    $pathv38 = "get/" . $j . "/VOL. 3 NO. 8 2017/";
    $row_v38 = $stmtv38->rowCount();

    $stmtv39 = $db->prepare("SELECT * FROM publications WHERE pub_journal = '$j' AND pub_issue = 'BACK' AND pub_volume LIKE 'VOL. 3 NO. 9 %'");
    $stmtv39->execute();
    $pathv39 = "get/" . $j . "/VOL. 3 NO. 9 2017/";
    $row_v39 = $stmtv39->rowCount();

    $stmtv310 = $db->prepare("SELECT * FROM publications WHERE pub_journal = '$j' AND pub_issue = 'BACK' AND pub_volume LIKE 'VOL. 3 NO. 10 %'");
    $stmtv310->execute();
    $pathv310 = "get/" . $j . "/VOL. 3 NO. 10 2017/";
    $row_v310 = $stmtv310->rowCount();

    $stmtv311 = $db->prepare("SELECT * FROM publications WHERE pub_journal = '$j' AND pub_issue = 'BACK' AND pub_volume LIKE 'VOL. 3 NO. 11 %'");
    $stmtv311->execute();
    $pathv311 = "get/" . $j . "/VOL. 3 NO. 11 2017/";
    $row_v311 = $stmtv311->rowCount();

    $stmtv312 = $db->prepare("SELECT * FROM publications WHERE pub_journal = '$j' AND pub_issue = 'BACK' AND pub_volume LIKE 'VOL. 3 NO. 12 %'");
    $stmtv312->execute();
    $pathv312 = "get/" . $j . "/VOL. 3 NO. 12 2017/";
    $row_v312 = $stmtv312->rowCount();

    $stmtv313 = $db->prepare("SELECT * FROM publications WHERE pub_journal = '$j' AND pub_issue = 'BACK' AND pub_volume LIKE 'VOL. 3 NO. 13 %'");
    $stmtv313->execute();
    $pathv313 = "get/" . $j . "/VOL. 3 NO. 13 2017/";
    $row_v313 = $stmtv313->rowCount();

    $stmtv41 = $db->prepare("SELECT * FROM publications WHERE pub_journal = '$j' AND pub_issue = 'BACK' AND pub_volume LIKE 'VOL. 4 NO. 1%'");
    $stmtv41->execute();
    $pathv41 = "get/" . $j . "/VOL. 4 NO. 1 2018/";
    $row_v41 = $stmtv41->rowCount();

    $stmtv42 = $db->prepare("SELECT * FROM publications WHERE pub_journal = '$j' AND pub_issue = 'BACK' AND pub_volume LIKE 'VOL. 4 NO. 2 %'");
    $stmtv42->execute();
    $pathv42 = "get/" . $j . "/VOL. 4 NO. 2 2018/";
    $row_v42 = $stmtv42->rowCount();

    $stmtv43 = $db->prepare("SELECT * FROM publications WHERE pub_journal = '$j' AND pub_issue = 'BACK' AND pub_volume LIKE 'VOL. 4 NO. 3 %'");
    $stmtv43->execute();
    $pathv43 = "get/" . $j . "/VOL. 4 NO. 3 2018/";
    $row_v43 = $stmtv43->rowCount();

    $stmtv44 = $db->prepare("SELECT * FROM publications WHERE pub_journal = '$j' AND pub_issue = 'BACK' AND pub_volume LIKE 'VOL. 4 NO. 4 %'");
    $stmtv44->execute();
    $pathv44 = "get/" . $j . "/VOL. 4 NO. 4 2018/";
    $row_v44 = $stmtv44->rowCount();

    $stmtv45 = $db->prepare("SELECT * FROM publications WHERE pub_journal = '$j' AND pub_issue = 'BACK' AND pub_volume LIKE 'VOL. 4 NO. 5 %'");
    $stmtv45->execute();
    $pathv45 = "get/" . $j . "/VOL. 4 NO. 5 2018/";
    $row_v45 = $stmtv45->rowCount();

    $stmtv46 = $db->prepare("SELECT * FROM publications WHERE pub_journal = '$j' AND pub_issue = 'BACK' AND pub_volume LIKE 'VOL. 4 NO. 6 %'");
    $stmtv46->execute();
    $pathv46 = "get/" . $j . "/VOL. 4 NO. 6 2018/";
    $row_v46 = $stmtv46->rowCount();

    $stmtv47 = $db->prepare("SELECT * FROM publications WHERE pub_journal = '$j' AND pub_issue = 'BACK' AND pub_volume LIKE 'VOL. 4 NO. 7 %'");
    $stmtv47->execute();
    $pathv47 = "get/" . $j . "/VOL. 4 NO. 7 2018/";
    $row_v47 = $stmtv47->rowCount();

    $stmtv48 = $db->prepare("SELECT * FROM publications WHERE pub_journal = '$j' AND pub_issue = 'BACK' AND pub_volume LIKE 'VOL. 4 NO. 8 %'");
    $stmtv48->execute();
    $pathv48 = "get/" . $j . "/VOL. 4 NO. 8 2018/";
    $row_v48 = $stmtv48->rowCount();

    $stmtv49 = $db->prepare("SELECT * FROM publications WHERE pub_journal = '$j' AND pub_issue = 'BACK' AND pub_volume LIKE 'VOL. 4 NO. 9 %'");
    $stmtv49->execute();
    $pathv49 = "get/" . $j . "/VOL. 4 NO. 9 2018/";
    $row_v49 = $stmtv49->rowCount();
    
    $stmtv51 = $db->prepare("SELECT * FROM publications WHERE pub_journal = '$j' AND pub_issue = 'BACK' AND pub_volume LIKE 'VOL. 5 NO. 1 %'");
    $stmtv51->execute();
    $pathv51 = "get/" . $j . "/VOL. 5 NO. 1 2019/";
    $row_v51 = $stmtv51->rowCount();
    
    $stmtv52 = $db->prepare("SELECT * FROM publications WHERE pub_journal = '$j' AND pub_issue = 'BACK' AND pub_volume LIKE 'VOL. 5 NO. 2 %'");
    $stmtv52->execute();
    $pathv52 = "get/" . $j . "/VOL. 5 NO. 2 2019/";
    $row_v52 = $stmtv52->rowCount();

    $stmtv53 = $db->prepare("SELECT * FROM publications WHERE pub_journal = '$j' AND pub_issue = 'BACK' AND pub_volume LIKE 'VOL. 5 NO. 3 %'");
    $stmtv53->execute();
    $pathv53 = "get/" . $j . "/VOL. 5 NO. 3 2019/";
    $row_v53 = $stmtv53->rowCount();

    $stmtv54 = $db->prepare("SELECT * FROM publications WHERE pub_journal = '$j' AND pub_issue = 'BACK' AND pub_volume LIKE 'VOL. 5 NO. 4 %'");
    $stmtv54->execute();
    $pathv54 = "get/" . $j . "/VOL. 5 NO. 4 2019/";
    $row_v54 = $stmtv54->rowCount();
    
    $stmtv55 = $db->prepare("SELECT * FROM publications WHERE pub_journal = '$j' AND pub_issue = 'BACK' AND pub_volume LIKE 'VOL. 5 NO. 5 %'");
    $stmtv55->execute();
    $pathv55 = "get/" . $j . "/VOL. 5 NO. 5 2019/";
    $row_v55 = $stmtv55->rowCount();
    
    $stmtv56 = $db->prepare("SELECT * FROM publications WHERE pub_journal = '$j' AND pub_issue = 'BACK' AND pub_volume LIKE 'VOL. 5 NO. 6 %'");
    $stmtv56->execute();
    $pathv56 = "get/" . $j . "/VOL. 5 NO. 6 2019/";
    $row_v56 = $stmtv56->rowCount();
    
    $stmtv57 = $db->prepare("SELECT * FROM publications WHERE pub_journal = '$j' AND pub_issue = 'BACK' AND pub_volume LIKE 'VOL. 5 NO. 7 %'");
    $stmtv57->execute();
    $pathv57 = "get/" . $j . "/VOL. 5 NO. 7 2020/";
    $row_v57 = $stmtv57->rowCount();
    
    $stmtv61 = $db->prepare("SELECT * FROM publications WHERE pub_journal = '$j' AND pub_issue = 'BACK' AND pub_volume LIKE 'VOL. 6 NO. 1 %'");
    $stmtv61->execute();
    $pathv61 = "get/" . $j . "/VOL. 6 NO. 1 2020/";
    $row_v61 = $stmtv61->rowCount();

    $stmtv62 = $db->prepare("SELECT * FROM publications WHERE pub_journal = '$j' AND pub_issue = 'BACK' AND pub_volume LIKE 'VOL. 6 NO. 2 %'");
    $stmtv62->execute();
    $pathv62 = "get/" . $j . "/VOL. 6 NO. 2 2020/";
    $row_v62 = $stmtv62->rowCount();

    $stmtv63 = $db->prepare("SELECT * FROM publications WHERE pub_journal = '$j' AND pub_issue = 'BACK' AND pub_volume LIKE 'VOL. 6 NO. 3 %'");
    $stmtv63->execute();
    $pathv63 = "get/" . $j . "/VOL. 6 NO. 3 2020/";
    $row_v63 = $stmtv63->rowCount();

    $stmtv64 = $db->prepare("SELECT * FROM publications WHERE pub_journal = '$j' AND pub_issue = 'BACK' AND pub_volume LIKE 'VOL. 6 NO. 4 %'");
    $stmtv64->execute();
    $pathv64 = "get/" . $j . "/VOL. 6 NO. 4 2020/";
    $row_v64 = $stmtv64->rowCount();

    $stmtv65 = $db->prepare("SELECT * FROM publications WHERE pub_journal = '$j' AND pub_issue = 'BACK' AND pub_volume LIKE 'VOL. 6 NO. 5 %'");
    $stmtv65->execute();
    $pathv65 = "get/" . $j . "/VOL. 6 NO. 5 2020/";
    $row_v65 = $stmtv65->rowCount();

    $stmtv71 = $db->prepare("SELECT * FROM publications WHERE pub_journal = '$j' AND pub_issue = 'BACK' AND pub_volume LIKE 'VOL. 7 NO. 1 %'");
    $stmtv71->execute();
    $pathv71 = "get/" . $j . "/VOL. 7 NO. 1 2021/";
    $row_v71 = $stmtv71->rowCount();

    $stmtv72 = $db->prepare("SELECT * FROM publications WHERE pub_journal = '$j' AND pub_issue = 'BACK' AND pub_volume LIKE 'VOL. 7 NO. 2 %'");
    $stmtv72->execute();
    $pathv72 = "get/" . $j . "/VOL. 7 NO. 2 2021/";
    $row_v72 = $stmtv72->rowCount();

    $stmtv73 = $db->prepare("SELECT * FROM publications WHERE pub_journal = '$j' AND pub_issue = 'BACK' AND pub_volume LIKE 'VOL. 7 NO. 3 %'");
    $stmtv73->execute();
    $pathv73 = "get/" . $j . "/VOL. 7 NO. 3 2021/";
    $row_v73 = $stmtv73->rowCount();

    $stmtv74 = $db->prepare("SELECT * FROM publications WHERE pub_journal = '$j' AND pub_issue = 'BACK' AND pub_volume LIKE 'VOL. 7 NO. 4 %'");
    $stmtv74->execute();
    $pathv74 = "get/" . $j . "/VOL. 7 NO. 4 2021/";
    $row_v74 = $stmtv74->rowCount();

    $stmtv75 = $db->prepare("SELECT * FROM publications WHERE pub_journal = '$j' AND pub_issue = 'BACK' AND pub_volume LIKE 'VOL. 7 NO. 5 %'");
    $stmtv75->execute();
    $pathv75 = "get/" . $j . "/VOL. 7 NO. 5 2021/";
    $row_v75 = $stmtv75->rowCount();

    $stmtv76 = $db->prepare("SELECT * FROM publications WHERE pub_journal = '$j' AND pub_issue = 'BACK' AND pub_volume LIKE 'VOL. 7 NO. 6 %'");
    $stmtv76->execute();
    $pathv76 = "get/" . $j . "/VOL. 7 NO. 6 2021/";
    $row_v76 = $stmtv76->rowCount();

    $stmtv81 = $db->prepare("SELECT * FROM publications WHERE pub_journal = '$j' AND pub_issue = 'BACK' AND pub_volume LIKE 'VOL. 8 NO. 1 %'");
    $stmtv81->execute();
    $pathv81 = "get/" . $j . "/VOL. 8 NO. 1 2021/";
    $row_v81 = $stmtv81->rowCount();

    $stmtv82 = $db->prepare("SELECT * FROM publications WHERE pub_journal = '$j' AND pub_issue = 'BACK' AND pub_volume LIKE 'VOL. 8 NO. 2 %'");
    $stmtv82->execute();
    $pathv82 = "get/" . $j . "/VOL. 8 NO. 2 2021/";
    $row_v82 = $stmtv82->rowCount();

    $stmtv83 = $db->prepare("SELECT * FROM publications WHERE pub_journal = '$j' AND pub_issue = 'BACK' AND pub_volume LIKE 'VOL. 8 NO. 3 %'");
    $stmtv83->execute();
    $pathv83 = "get/" . $j . "/VOL. 8 NO. 3 2021/";
    $row_v83 = $stmtv83->rowCount();

    $stmtv84 = $db->prepare("SELECT * FROM publications WHERE pub_journal = '$j' AND pub_issue = 'BACK' AND pub_volume LIKE 'VOL. 8 NO. 4 %'");
    $stmtv84->execute();
    $pathv84 = "get/" . $j . "/VOL. 8 NO. 4 2021/";
    $row_v84 = $stmtv84->rowCount();

    $stmtv85 = $db->prepare("SELECT * FROM publications WHERE pub_journal = '$j' AND pub_issue = 'BACK' AND pub_volume LIKE 'VOL. 8 NO. 5 %'");
    $stmtv85->execute();
    $pathv85 = "get/" . $j . "/VOL. 8 NO. 5 2022/";
    $row_v85 = $stmtv85->rowCount();
    
    $stmtv86 = $db->prepare("SELECT * FROM publications WHERE pub_journal = '$j' AND pub_issue = 'BACK' AND pub_volume LIKE 'VOL. 8 NO. 6 %'");
    $stmtv86->execute();
    $pathv86 = "get/" . $j . "/VOL. 8 NO. 6 2022/";
    $row_v86 = $stmtv86->rowCount();
    
    
    $stmtv87 = $db->prepare("SELECT * FROM publications WHERE pub_journal = '$j' AND pub_issue = 'BACK' AND pub_volume LIKE 'VOL. 8 NO. 7 %'");
    $stmtv87->execute();
    $pathv87 = "get/" . $j . "/VOL. 8 NO. 7 2022/";
    $row_v87 = $stmtv87->rowCount();
    
    $stmtv88 = $db->prepare("SELECT * FROM publications WHERE pub_journal = '$j' AND pub_issue = 'BACK' AND pub_volume LIKE 'VOL. 8 NO. 8 %'");
    $stmtv88->execute();
    $pathv88 = "get/" . $j . "/VOL. 8 NO. 8 2022/";
    $row_v88 = $stmtv88->rowCount();
    
    $stmtv91 = $db->prepare("SELECT * FROM publications WHERE pub_journal = '$j' AND pub_issue = 'BACK' AND pub_volume LIKE 'VOL. 9 NO. 1 %'");
    $stmtv91->execute();
    $pathv91 = "get/" . $j . "/VOL. 9 NO. 1 2023/";
    $row_v91 = $stmtv91->rowCount();
    
    $stmtv92 = $db->prepare("SELECT * FROM publications WHERE pub_journal = '$j' AND pub_issue = 'BACK' AND pub_volume LIKE 'VOL. 9 NO. 2 %'");
    $stmtv92->execute();
    $pathv92 = "get/" . $j . "/VOL. 9 NO. 2 2023/";
    $row_v92 = $stmtv92->rowCount();

    $stmtv93 = $db->prepare("SELECT * FROM publications WHERE pub_journal = '$j' AND pub_issue = 'BACK' AND pub_volume LIKE 'VOL. 9 NO. 3 %'");
    $stmtv93->execute();
    $pathv93 = "get/" . $j . "/VOL. 9 NO. 3 2023/";
    $row_v93 = $stmtv93->rowCount();
    
    $stmtv94 = $db->prepare("SELECT * FROM publications WHERE pub_journal = '$j' AND pub_issue = 'BACK' AND pub_volume LIKE 'VOL. 9 NO. 4 %'");
    $stmtv94->execute();
    $pathv94 = "get/" . $j . "/VOL. 9 NO. 4 2023/";
    $row_v94 = $stmtv94->rowCount();

    $stmtv95 = $db->prepare("SELECT * FROM publications WHERE pub_journal = '$j' AND pub_issue = 'BACK' AND pub_volume LIKE 'VOL. 9 NO. 5 %'");
    $stmtv95->execute();
    $pathv95 = "get/" . $j . "/VOL. 9 NO. 5 2023/";
    $row_v95 = $stmtv95->rowCount();

    $stmtv96 = $db->prepare("SELECT * FROM publications WHERE pub_journal = '$j' AND pub_issue = 'BACK' AND pub_volume LIKE 'VOL. 9 NO. 6 %'");
    $stmtv96->execute();
    $pathv96 = "get/" . $j . "/VOL. 9 NO. 6 2023/";
    $row_v96 = $stmtv96->rowCount();

    $stmtv97 = $db->prepare("SELECT * FROM publications WHERE pub_journal = '$j' AND pub_issue = 'BACK' AND pub_volume LIKE 'VOL. 9 NO. 7 %'");
    $stmtv97->execute();
    $pathv97 = "get/" . $j . "/VOL. 9 NO. 7 2023/";
    $row_v97 = $stmtv97->rowCount();

    $stmtv98 = $db->prepare("SELECT * FROM publications WHERE pub_journal = '$j' AND pub_issue = 'BACK' AND pub_volume LIKE 'VOL. 9 NO. 8 %'");
    $stmtv98->execute();
    $pathv98 = "get/" . $j . "/VOL. 9 NO. 8 2023/";
    $row_v98 = $stmtv98->rowCount();
    
    $stmtv99 = $db->prepare("SELECT * FROM publications WHERE pub_journal = '$j' AND pub_issue = 'BACK' AND pub_volume LIKE 'VOL. 9 NO. 9 %'");
    $stmtv99->execute();
    $pathv99 = "get/" . $j . "/VOL. 9 NO. 9 2023/";
    $row_v99 = $stmtv99->rowCount();

    $stmtv100 = $db->prepare("SELECT * FROM publications WHERE pub_journal = '$j' AND pub_issue = 'BACK' AND pub_volume LIKE 'VOL. 9 NO. 10 %'");
    $stmtv100->execute();
    $pathv100 = "get/" . $j . "/VOL. 9 NO. 10 2023/";
    $row_v100 = $stmtv100->rowCount();

    $stmtv101 = $db->prepare("SELECT * FROM publications WHERE pub_journal = '$j' AND pub_issue = 'BACK' AND pub_volume LIKE 'VOL. 9 NO. 11 %'");
    $stmtv101->execute();
    $pathv101 = "get/" . $j . "/VOL. 9 NO. 11 2023/";
    $row_v101 = $stmtv101->rowCount();

    $stmtv102 = $db->prepare("SELECT * FROM publications WHERE pub_journal = '$j' AND pub_issue = 'BACK' AND pub_volume LIKE 'VOL. 9 NO. 12 %'");
    $stmtv102->execute();
    $pathv102 = "get/" . $j . "/VOL. 9 NO. 12 2023/";
    $row_v102 = $stmtv102->rowCount();

    $stmtv110 = $db->prepare("SELECT * FROM publications WHERE pub_journal = '$j' AND pub_issue = 'BACK' AND pub_volume LIKE 'VOL. 10 NO. 1 %'");
    $stmtv110->execute();
    $pathv110 = "get/" . $j . "/VOL. 10 NO. 1 2024/";
    $row_v110 = $stmtv110->rowCount();

    $stmtv112 = $db->prepare("SELECT * FROM publications WHERE pub_journal = '$j' AND pub_issue = 'BACK' AND pub_volume LIKE 'VOL. 10 NO. 2 %'");
    $stmtv112->execute();
    $pathv112 = "get/" . $j . "/VOL. 10 NO. 2 2024/";
    $row_v112 = $stmtv112->rowCount();


    $stmtv113 = $db->prepare("SELECT * FROM publications WHERE pub_journal = '$j' AND pub_issue = 'BACK' AND pub_volume LIKE 'VOL. 10 NO. 3 %'");
    $stmtv113->execute();
    $pathv113 = "get/" . $j . "/VOL. 10 NO. 3 2024/";
    $row_v113 = $stmtv113->rowCount();

    $stmtv114 = $db->prepare("SELECT * FROM publications WHERE pub_journal = '$j' AND pub_issue = 'BACK' AND pub_volume LIKE 'VOL. 10 NO. 4 %'");
    $stmtv114->execute();
    $pathv114 = "get/" . $j . "/VOL. 10 NO. 4 2024/";
    $row_v114 = $stmtv114->rowCount();

    $stmtv115 = $db->prepare("SELECT * FROM publications WHERE pub_journal = '$j' AND pub_issue = 'BACK' AND pub_volume LIKE 'VOL. 10 NO. 5 %'");
    $stmtv115->execute();
    $pathv115 = "get/" . $j . "/VOL. 10 NO. 5 2024/";
    $row_v115 = $stmtv115->rowCount();



    
    
    
    

    /*//get number of items in BACK
    $count2 = $stmt2->fetchAll();
    $count2 = count($count2);
    */


//related journals
    $stmt3 = $db->prepare("SELECT * FROM journals WHERE journal_category = '$category' LIMIT 4");
    $stmt3->execute();

    ?>
    <!DOCTYPE html>
    <html>
    <head>
        <?php include_once("inc/path.php"); ?>
        

        <title>IIARD | <?php echo $j; ?>- International Institute of Academic Research and development .</title>
        <!-- for-mobile-apps -->
		<link rel="icon" type="image/x-icon" href="images/no-bg-logo.png" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <meta name="Description"
              content="IIARD Publications is an independent institution in Africa. It focuses on the developmental issues of the continent, by providing a medium for interaction between researchers in the academic community. Its main purpose is to foster the relationship between researchers and to create an enabling environment for contributors and academicians to share ideas that relates to developmental issues.">
        <meta name="keyword"
              content="iiardpub, iiard, research, publication, 'publications', publications, journal, journals, institute, 'publication company', 'online publication', 'academic research and development', 'international institute',iiardpublication, 'academic research', 'international journals', 'international publications', 'international journal','international publication'">
        <script type="application/x-javascript"> addEventListener("load", function () {
                setTimeout(hideURLbar, 0);
            }, false);

            function hideURLbar() {
                window.scrollTo(0, 1);
            } </script>
        <!--//for-mobile-apps -->
        <!--Custom Theme files -->
        <link rel="shortcut icon" href="css/favicon.ico" type="image/x-icon">
        <link rel="icon" href="css/favicon.ico" type="image/x-icon">
        <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all"/>
        <link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
        <!--//Custom Theme files -->
		

        <!--js-->
        <script src="js/jquery-1.11.1.min.js"></script>
        <script src="js/modernizr.custom.js"></script>
        <!--//js-->

        </script>

        <!--cart-->
        <script src = "js/simpleCart.min.js" ></script>
        <!--cart-->
        <!--web-fonts-->
        <link href='//fonts.googleapis.com/css?family=Raleway:400,100,100italic,200,200italic,300,400italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic'
              rel='stylesheet' type='text/css'>
        <link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic'
              rel='stylesheet' type='text/css'>
        <link href='//fonts.googleapis.com/css?family=Pompiere' rel='stylesheet' type='text/css'>
        <link href='//fonts.googleapis.com/css?family=Fascinate' rel='stylesheet' type='text/css'>
        <!--web-fonts-->
        <!--animation-effect-->
        <link href="css/animate.min.css" rel="stylesheet">
        <script src="js/wow.min.js"></script>
        <?php include "inc/marquee.php"; ?>
        <script>
            new WOW().init();
        </script>
        <!--//animation-effect-->
        <!--start-smooth-scrolling-->
        <script type="text/javascript" src="js/move-top.js"></script>
        <script type="text/javascript" src="js/easing.js"></script>
        <script type="text/javascript">
            jQuery(document).ready(function ($) {
                $(".scroll").click(function (event) {
                    event.preventDefault();
                    $('html,body').animate({scrollTop: $(this.hash).offset().top}, 1000);
                });
            });
        </script>
        <!--//end-smooth-scrolling-->
    </head>
 <!--style for handling current2 posion for small devices-->
<style>


#current_2 {
width:90%
text-align:left;
}

.download_button{
background-color:transparent;
  border-radius:20px;
  padding:5px;
  padding-right:30px;
  padding-left:30px;
  font-size: 15px;
  font-weight: 600; 
  border: solid #8c3f1b 1px;
  color:#111;
} 

 .download_button:hover {
  color: #ffffff;
  background-color:#d48133;
  text-decoration: none;
}


@media only screen and (max-width: 620px) {
  /* For mobile phones: */
  #current_2 {
    width: 100%;
    text-align:left;
  }


}

</style>


    <body>

    <!--header-->

    <?php include_once("inc/header.php"); ?>
    <!--//header-->
    <!--breadcrumbs-->
    <div class="breadcrumbs">
        <div class="container">
            <ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
                <li><a href="index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
                <li><a href="journals/"><span class="glyphicon" aria-hidden="true"></span>Journals</a></li>
                <li class="active"><?php echo $row['journal_name']; ?></li>
            </ol>
        </div>
    </div>
    <!--//breadcrumbs-->
    <!--single-page-->
    <div class="products">
        <div class="container" style="background:#fff;">
            <div id="journal" style="display:block" class="col-md-9 product-model-sec">
                <!-- <div class="title-info wow fadeInUp animated" data-wow-delay=".5s" style="text-align:left;"></div> > -->
                
                 <div class="col-md-6 single-top wow fadeInLeft animated" data-wow-delay=".5s">


                    <img src="get/cover/<?php echo $row['journal_name']; ?>.jpg" class="img-responsive"
                         alt="<?php echo $row['journal_name']; ?>" 
						 style=" border-radius:40px; padding:5px; object-fit: cover; background: rgba(255, 255, 255, 0.2); box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1); backdrop-filter: blur(5px); -webkit-backdrop-filter: blur(5px); border: 1px solid rgba(255, 255, 255, 0.3); margin:auto;">
                    <?php if ($row['journal'] != "OLD") { ?>
                       <!--  <span class="star"> </span> -->
                    <?php } ?>

                </div>
                
                <h3 class="title" style="margin-top:0px; font-size:20px;"> <?php echo $row['journal_name_full']; ?>
                    <span>(<?php echo $row['journal_name']; ?>) <br><?php echo $row['ISSN']; ?></span></h3>
                <hr class="bs-docs-separator wow fadeInDown animated" data-wow-delay=".5s">

                <p style="text-align:justify;">
          <?php echo nl2br($row['journal_description']);?>
<br>
</p>
<?php 
$journal_description_list = $row['journal_description_list'];

$middle_journal_description = strrpos(substr($journal_description_list, 0, floor(strlen($journal_description_list) / 2)), ' ') + 1;

$journal_description_list1 = substr($journal_description_list, 0, $middle_journal_description);
$journal_description_list2 = substr($journal_description_list,    $middle_journal_description);
  ?>
<hr>

  <div class="col-sm-6 in-gp-tl" style="; display:block;">
      <?php echo nl2br($journal_description_list1);?>
	     </div>
   
    <div class="col-sm-6 in-gp-tl" style="display:block;">
        <?php echo nl2br($journal_description_list2);?>
		</div>
               
        <hr> <br>
<div class="clearfix"  ></div>
      

			     <p style="text-align:justify; display:block; margin:4px;">      
                <br>
                <span>&#73;</span>IARD is a member of CrossRef...<br>
                The DOI of this journal is: <a href="https://doi.org/10.56201/<?php echo $row['journal_name'] ?>">https://doi.org/10.56201/<?php echo $row['journal_name'] ?> </a>
                </p>
                
                

                <div class="clearfix " ></div>
                <br>


                <?php include_once ("current2.php") ?>


                
            </div>

            

            <!--Curent Issues-->
            <div id="current" style="display:none" class="col-md-9 product-model-sec">
                <div class="title-info wow fadeInUp animated" data-wow-delay=".5s" style="text-align:left;"></div>
                <h3 class="title" style="margin-top:-70px;"> <?php echo $row['journal_name_full']; ?>
                    <span>(<?php echo $row['ISSN']; ?>) <br>Current Issue...</span></h3> <br>

             <!--    <a href="Back_covers/<?php echo $row['journal_name']?>.pdf" class="download_button" alt="FILE NOT FOUND!">DOWNLOAD JOURNAL'S BACK COVER.</a> -->
                

                <hr class="bs-docs-separator wow fadeInDown animated" data-wow-delay=".5s">
                <?php $rowv = $stmtv->fetch(PDO::FETCH_ASSOC); //print_r($rowv);
                echo $rowv['pub_volume']; ?>
                <!--
              <p> <a id="homec" href="#"><span class="label label-primary">Journal Home</span></a>
              </p>-->

                <ul class="list-group">

                    <?php
                    if (!($row_curr > 0)) {
                        ?>

                        <li class="list-group-item">THERE IS NO ISSUE AT THIS TIME</li>
                    <?php } else {   ?>
                                       
                       <?php while ($row1 = $stmt1->fetch(PDO::FETCH_ASSOC)) {
                            ?>

                            <li class="list-group-item"><a class="items" style="color:#337ab7;"
            href="abstract.php?j=<?php echo $row1['pub_journal'];?>&pn=<?php echo $row1['pub_name']; ?>&id=<?php echo $row1['id']; ?>" target="_blank" >
                                                          <span
                                            class="glyphicon glyphicon-cloud-download"
                                            aria-hidden="true"></span><?php echo $row1['pub_name']; ?></a> <br>
                                <p style="color:#FF590F;">Author(s): <?php echo $row1['pub_author']; ?></p>
                                <!-- 
                                <a href=" <?php echo $row1['path']; ?>"   target="_blank" >...</a>
                                 onclick="window.open('abstract.php/'); " -->
                                </li>
                                
                            <?php
                        }
                    } ?>

                </ul>
                <br>
                <div class="clearfix"></div>
                </div>
            <!--Current Issue-->

            <!--back issues-->
            <div id="back" style="display:none" class="col-md-9 product-model-sec">
                <div class="title-info wow fadeInUp animated" data-wow-delay=".5s" style="text-align:left;"></div>
                <h3 class="title" style="margin-top:-70px;"> <?php echo $row['journal_name_full']; ?>
                    <span>(<?php echo $row['ISSN']; ?>) <br>Back Issue</span></h3>
                <hr class="bs-docs-separator wow fadeInDown animated" data-wow-delay=".5s">

                <div class="col-md-12 fadeInLeft animated" style="height: 100%;max-height: 550px; overflow-y: scroll;">

                    <ul class="faq" style="display: flex; flex-direction: column-reverse;">


                        <?php
                        if ($row_v1 > 0) {
                            //vol1
                            ?>
                            <li class="item1 "><a href="#" class="list-group-item">VOL 1<span class="icon"> </span></a>
                            <ul>
                                <?php
                                while ($rowv1 = $stmtv1->fetch(PDO::FETCH_ASSOC)) {
                                    ?>
                                    <li class="list-group-item"><a class="items"  style="color:#337ab7;"
                            href="abstract.php?j=<?php echo $rowv1['pub_journal'];?>&pn=<?php echo $rowv1['pub_name']; ?>&id=<?php echo $rowv1['id']; ?>" target="_blank"><span
                                                    class="glyphicon glyphicon-cloud-download"
                                                    aria-hidden="true"></span> <?php echo $rowv1['pub_name']; ?> </a>
                                        <p style="color:#FF590F;"> Author(s): <?php echo $rowv1['pub_author']; ?></p>
                                    </li>
                                <?php } ?>

                            </ul>
                            </li><?php } else { ?>
                            <li class="item1 "><a href="#" class="list-group-item"><span class="icon"> </span></a></li>
                        <?php } ?>

                        <?php
                        if ($row_v21 > 0) {
                            //if(file_exists($pathv21)){//vol2n1
                            ?>
                            <li class="item2 "><a href="#" class="list-group-item">VOL. 2 N0. 1<span
                                        class="icon"> </span></a>
                            <ul>
                                <?php
                                while ($rowv21 = $stmtv21->fetch(PDO::FETCH_ASSOC)) {
                                    ?>
                                    <li class="list-group-item"><a class="items" style="color:#337ab7;"
                            href="abstract.php?j=<?php echo $rowv21['pub_journal'];?>&pn=<?php echo $rowv21['pub_name']; ?>&id=<?php echo $rowv21['id']; ?>" target="_blank"><span
                                                    class="glyphicon glyphicon-cloud-download"
                                                    aria-hidden="true"></span><?php echo $rowv21['pub_name']; ?></a>
                                        <p style="color:#FF590F;"> Author(s): <?php echo $rowv21['pub_author']; ?></p>
                                    </li>
                                <?php } ?>

                            </ul>
                            </li><?php } ?>


                        <?php
                        if ($row_v22 > 0) {
                            //if(file_exists($pathv22)){//vol2n2
                            ?>
                            <li class="item "><a href="#" class="list-group-item">VOL. 2 N0. 2<span
                                        class="icon"> </span></a>
                            <ul>
                                <?php
                                while ($rowv22 = $stmtv22->fetch(PDO::FETCH_ASSOC)) {
                                    ?>
                                    <li class="list-group-item"><a class="items" style="color:#337ab7;"
                                  href="abstract.php?j=<?php echo $rowv22['pub_journal'];?>&pn=<?php echo $rowv22['pub_name']; ?>&id=<?php echo $rowv22['id']; ?>" target="_blank"><span
                                                    class="glyphicon glyphicon-cloud-download"
                                                    aria-hidden="true"></span><?php echo $rowv22['pub_name']; ?></a>
                                        <p style="color:#FF590F;"> Author(s): <?php echo $rowv22['pub_author']; ?></p>
                                    </li>
                                <?php } ?>

                            </ul>
                            </li><?php } ?>



                        <?php
                        if ($row_v23 > 0) {
                            //if(file_exists($pathv23)){//vol2n3
                            ?>
                            <li class="item "><a href="#" class="list-group-item">VOL. 2 N0. 3<span
                                        class="icon"> </span></a>
                            <ul>
                                <?php
                                while ($rowv23 = $stmtv23->fetch(PDO::FETCH_ASSOC)) {
                                    ?>
                                    <li class="list-group-item"><a class="items" style="color:#337ab7;"
                            href="abstract.php?j=<?php echo $rowv23['pub_journal'];?>&pn=<?php echo $rowv23['pub_name']; ?>&id=<?php echo $rowv23['id']; ?>" target="_blank"><span
                                                    class="glyphicon glyphicon-cloud-download"
                                                    aria-hidden="true"></span><?php echo $rowv23['pub_name']; ?></a>
                                        <p style="color:#FF590F;"> Author(s): <?php echo $rowv23['pub_author']; ?></p>
                                    </li>
                                <?php } ?>

                            </ul>
                            </li><?php } ?>

                        <?php
                        if ($row_v24 > 0) {
                            //if(file_exists($pathv24)){//vol2n4
                            ?>
                            <li class="item "><a href="#" class="list-group-item">VOL. 2 N0. 4<span
                                        class="icon"> </span></a>
                            <ul>
                                <?php
                                while ($rowv24 = $stmtv24->fetch(PDO::FETCH_ASSOC)) {
                                    ?>
                                    <li class="list-group-item"><a class="items" style="color:#337ab7;"
                                href="abstract.php?j=<?php echo $rowv24['pub_journal'];?>&pn=<?php echo $rowv24['pub_name']; ?>&id=<?php echo $rowv24['id']; ?>" target="_blank"><span
                                                    class="glyphicon glyphicon-cloud-download"
                                                    aria-hidden="true"></span><?php echo $rowv24['pub_name']; ?></a>
                                        <p style="color:#FF590F;"> Author(s): <?php echo $rowv24['pub_author']; ?></p>
                                    </li>
                                <?php } ?>

                            </ul>
                            </li><?php } ?>

                        <?php
                        if ($row_v25 > 0) {
                            //if(file_exists($pathv25)){//vol2n5
                            ?>
                            <li class="item "><a href="#" class="list-group-item">VOL. 2 N0. 5<span
                                        class="icon"> </span></a>
                            <ul>
                                <?php
                                while ($rowv25 = $stmtv25->fetch(PDO::FETCH_ASSOC)) {
                                    ?>
                                    <li class="list-group-item"><a class="items" style="color:#337ab7;"
                                    href="abstract.php?j=<?php echo $rowv25['pub_journal'];?>&pn=<?php echo $rowv25['pub_name']; ?>&id=<?php echo $rowv25['id']; ?>" target="_blank"><span
                                                    class="glyphicon glyphicon-cloud-download"
                                                    aria-hidden="true"></span><?php echo $rowv25['pub_name']; ?></a>
                                        <p style="color:#FF590F;"> Author(s): <?php echo $rowv25['pub_author']; ?></p>
                                    </li>
                                <?php } ?>

                            </ul>
                            </li><?php } ?>

                        <?php
                        if ($row_v26 > 0) {
                            //if(file_exists($pathv26)){//vol2n5
                            ?>
                            <li class="item "><a href="#" class="list-group-item">VOL. 2 N0. 6<span
                                        class="icon"> </span></a>
                            <ul>
                                <?php
                                while ($rowv26 = $stmtv26->fetch(PDO::FETCH_ASSOC)) {
                                    ?>
                                    <li class="list-group-item"><a class="items" style="color:#337ab7;"
                                href="abstract.php?j=<?php echo $rowv26['pub_journal'];?>&pn=<?php echo $rowv26['pub_name']; ?>&id=<?php echo $rowv26['id']; ?>" target="_blank"><span
                                                    class="glyphicon glyphicon-cloud-download"
                                                    aria-hidden="true"></span><?php echo $rowv26['pub_name']; ?></a>
                                        <p style="color:#FF590F;"> Author(s): <?php echo $rowv26['pub_author']; ?></p>
                                    </li>
                                <?php } ?>

                            </ul>
                            </li><?php } ?>

                        <?php
                        if ($row_v27 > 0) {
                            //if(file_exists($pathv27)){//vol2n5
                            ?>
                            <li class="item "><a href="#" class="list-group-item">VOL. 2 N0. 7<span
                                        class="icon"> </span></a>
                            <ul>
                                <?php
                                while ($rowv27 = $stmtv27->fetch(PDO::FETCH_ASSOC)) {
                                    ?>
                                    <li class="list-group-item"><a class="items" style="color:#337ab7;"
                                 href="abstract.php?j=<?php echo $rowv27['pub_journal'];?>&pn=<?php echo $rowv27['pub_name']; ?>&id=<?php echo $rowv27['id']; ?>" target="_blank"><span
                                                    class="glyphicon glyphicon-cloud-download"
                                                    aria-hidden="true"></span><?php echo $rowv27['pub_name']; ?></a>
                                        <p style="color:#FF590F;"> Author(s): <?php echo $rowv27['pub_author']; ?></p>
                                    </li>
                                <?php } ?>

                            </ul>
                            </li><?php } ?>

                        <?php
                        if ($row_v28 > 0) {
                            //if(file_exists($pathv28)){//vol2n5
                            ?>
                            <li class="item "><a href="#" class="list-group-item">VOL. 2 N0. 8<span
                                        class="icon"> </span></a>
                            <ul>
                                <?php
                                while ($rowv28 = $stmtv28->fetch(PDO::FETCH_ASSOC)) {
                                    ?>
                                    <li class="list-group-item"><a class="items" style="color:#337ab7;"
                                href="abstract.php?j=<?php echo $rowv28['pub_journal'];?>&pn=<?php echo $rowv28['pub_name']; ?>&id=<?php echo $rowv28['id']; ?>" target="_blank"><span
                                                    class="glyphicon glyphicon-cloud-download"
                                                    aria-hidden="true"></span><?php echo $rowv28['pub_name']; ?></a>
                                        <p style="color:#FF590F;"> Author(s): <?php echo $rowv28['pub_author']; ?></p>
                                    </li>
                                <?php } ?>

                            </ul>
                            </li><?php } ?>

                        <?php
                        if ($row_v29 > 0) {
                            //if(file_exists($pathv29)){//vol2n5
                            ?>
                            <li class="item "><a href="#" class="list-group-item">VOL. 2 N0. 9<span
                                        class="icon"> </span></a>
                            <ul>
                                <?php
                                while ($rowv29 = $stmtv29->fetch(PDO::FETCH_ASSOC)) {
                                    ?>
                                    <li class="list-group-item"><a class="items" style="color:#337ab7;"
                              href="abstract.php?j=<?php echo $rowv29['pub_journal'];?>&pn=<?php echo $rowv29['pub_name']; ?>&id=<?php echo $rowv29['id']; ?>" target="_blank"><span
                                                    class="glyphicon glyphicon-cloud-download"
                                                    aria-hidden="true"></span><?php echo $rowv29['pub_name']; ?></a>
                                        <p style="color:#FF590F;"> Author(s): <?php echo $rowv29['pub_author']; ?></p>
                                    </li>
                                <?php } ?>

                            </ul>
                            </li><?php } ?>

                        <?php
                        if ($row_v31 > 0) {
                            //if(file_exists($pathv31)){//vol2n5
                            ?>
                            <li class="item "><a href="#" class="list-group-item">VOL. 3 N0. 1<span
                                        class="icon"> </span></a>
                            <ul>
                                <?php
                                while ($rowv31 = $stmtv31->fetch(PDO::FETCH_ASSOC)) {
                                    ?>
                                    <li class="list-group-item"><a class="items" style="color:#337ab7;"
                              href="abstract.php?j=<?php echo $rowv31['pub_journal'];?>&pn=<?php echo $rowv31['pub_name']; ?>&id=<?php echo $rowv31['id']; ?>" target="_blank"><span
                                                    class="glyphicon glyphicon-cloud-download"
                                                    aria-hidden="true"></span><?php echo $rowv31['pub_name']; ?></a>
                                        <p style="color:#FF590F;"> Author(s): <?php echo $rowv31['pub_author']; ?></p>
                                    </li>
                                <?php } ?>

                            </ul>
                            </li><?php } ?>


                        <?php
                        if ($row_v32 > 0) {
                            //if(file_exists($pathv32)){//vol2n5
                            ?>
                            <li class="item "><a href="#" class="list-group-item">VOL. 3 N0. 2<span
                                        class="icon"> </span></a>
                            <ul>
                                <?php
                                while ($rowv32 = $stmtv32->fetch(PDO::FETCH_ASSOC)) {
                                    ?>
                                    <li class="list-group-item"><a class="items" style="color:#337ab7;"
                                     href="abstract.php?j=<?php echo $rowv32['pub_journal'];?>&pn=<?php echo $rowv32['pub_name']; ?>&id=<?php echo $rowv32['id']; ?>" target="_blank"><span
                                                    class="glyphicon glyphicon-cloud-download"
                                                    aria-hidden="true"></span><?php echo $rowv32['pub_name']; ?></a>
                                        <p style="color:#FF590F;"> Author(s): <?php echo $rowv32['pub_author']; ?></p>
                                    </li>
                                <?php } ?>

                            </ul>
                            </li><?php } ?>

                        <?php
                        if ($row_v33 > 0) {
                            //if(file_exists($pathv33)){//vol2n5
                            ?>
                            <li class="item "><a href="#" class="list-group-item">VOL. 3 N0. 3<span
                                        class="icon"> </span></a>
                            <ul>
                                <?php
                                while ($rowv33 = $stmtv33->fetch(PDO::FETCH_ASSOC)) {
                                    ?>
                                    <li class="list-group-item"><a class="items" style="color:#337ab7;"
                                 href="abstract.php?j=<?php echo $rowv33['pub_journal'];?>&pn=<?php echo $rowv33['pub_name']; ?>&id=<?php echo $rowv33['id']; ?>" target="_blank"><span
                                                    class="glyphicon glyphicon-cloud-download"
                                                    aria-hidden="true"></span><?php echo $rowv33['pub_name']; ?></a>
                                        <p style="color:#FF590F;"> Author(s): <?php echo $rowv33['pub_author']; ?></p>
                                    </li>
                                <?php } ?>

                            </ul>
                            </li><?php } ?>

                        <?php
                        if ($row_v34 > 0) {
                            //if(file_exists($pathv34)){//vol2n5
                            ?>
                            <li class="item "><a href="#" class="list-group-item">VOL. 3 N0. 4<span
                                        class="icon"> </span></a>
                            <ul>
                                <?php
                                while ($rowv34 = $stmtv34->fetch(PDO::FETCH_ASSOC)) {
                                    ?>
                                    <li class="list-group-item"><a class="items" style="color:#337ab7;"
                       href="abstract.php?j=<?php echo $rowv34['pub_journal'];?>&pn=<?php echo $rowv34['pub_name']; ?>&id=<?php echo $rowv34['id']; ?>" target="_blank"><span
                                                    class="glyphicon glyphicon-cloud-download"
                                                    aria-hidden="true"></span><?php echo $rowv34['pub_name']; ?></a>
                                        <p style="color:#FF590F;"> Author(s): <?php echo $rowv34['pub_author']; ?></p>
                                    </li>
                                <?php } ?>

                            </ul>
                            </li><?php } ?>

                        <?php
                        if ($row_v35 > 0) {
                            //if(file_exists($pathv35)){//vol2n5
                            ?>
                            <li class="item "><a href="#" class="list-group-item">VOL. 3 N0. 5<span
                                        class="icon"> </span></a>
                            <ul>
                                <?php
                                while ($rowv35 = $stmtv35->fetch(PDO::FETCH_ASSOC)) {
                                    ?>
                                    <li class="list-group-item"><a class="items" style="color:#337ab7;"
                                 href="abstract.php?j=<?php echo $rowv35['pub_journal'];?>&pn=<?php echo $rowv35['pub_name']; ?>&id=<?php echo $rowv35['id']; ?>" target="_blank"><span
                                                    class="glyphicon glyphicon-cloud-download"
                                                    aria-hidden="true"></span><?php echo $rowv35['pub_name']; ?></a>
                                        <p style="color:#FF590F;"> Author(s): <?php echo $rowv35['pub_author']; ?></p>
                                    </li>
                                <?php } ?>

                            </ul>
                            </li><?php } ?>

                        <?php
                        if ($row_v36 > 0) {
                            //if(file_exists($pathv36)){//vol2n5
                            ?>
                            <li class="item "><a href="#" class="list-group-item">VOL. 3 N0. 6<span
                                        class="icon"> </span></a>
                            <ul>
                                <?php
                                while ($rowv36 = $stmtv36->fetch(PDO::FETCH_ASSOC)) {
                                    ?>
                                    <li class="list-group-item"><a class="items" style="color:#337ab7;"
                             href="abstract.php?j=<?php echo $rowv36['pub_journal'];?>&pn=<?php echo $rowv36['pub_name']; ?>&id=<?php echo $rowv36['id']; ?>" target="_blank"><span
                                                    class="glyphicon glyphicon-cloud-download"
                                                    aria-hidden="true"></span><?php echo $rowv36['pub_name']; ?></a>
                                        <p style="color:#FF590F;"> Author(s): <?php echo $rowv36['pub_author']; ?></p>
                                    </li>
                                <?php } ?>

                            </ul>
                            </li><?php } ?>

                        <?php
                        if ($row_v37 > 0) {
                            // if(file_exists($pathv37)){//vol2n5
                            ?>
                            <li class="item "><a href="#" class="list-group-item">VOL. 3 N0. 7<span
                                        class="icon"> </span></a>
                            <ul>
                                <?php
                                while ($rowv37 = $stmtv37->fetch(PDO::FETCH_ASSOC)) {
                                    ?>
                                    <li class="list-group-item"><a class="items" style="color:#337ab7;"
                                 href="abstract.php?j=<?php echo $rowv37['pub_journal'];?>&pn=<?php echo $rowv37['pub_name']; ?>&id=<?php echo $rowv37['id']; ?>" target="_blank"><span
                                                    class="glyphicon glyphicon-cloud-download"
                                                    aria-hidden="true"></span><?php echo $rowv37['pub_name']; ?></a>
                                        <p style="color:#FF590F;"> Author(s): <?php echo $rowv37['pub_author']; ?></p>
                                    </li>
                                <?php } ?>

                            </ul>
                            </li><?php } ?>

                        <?php
                        if ($row_v38 > 0) {
                            //if(file_exists($pathv37)){//vol2n5
                            ?>
                            <li class="item "><a href="#" class="list-group-item">VOL. 3 N0. 8<span
                                        class="icon"> </span></a>
                            <ul>
                                <?php
                                while ($rowv38 = $stmtv38->fetch(PDO::FETCH_ASSOC)) {
                                    ?>
                                    <li class="list-group-item"><a class="items" style="color:#337ab7;"
                                href="abstract.php?j=<?php echo $rowv38['pub_journal'];?>&pn=<?php echo $rowv38['pub_name']; ?>&id=<?php echo $rowv38['id']; ?>" target="_blank"><span
                                                    class="glyphicon glyphicon-cloud-download"
                                                    aria-hidden="true"></span><?php echo $rowv38['pub_name']; ?></a>
                                        <p style="color:#FF590F;"> Author(s): <?php echo $rowv38['pub_author']; ?></p>
                                    </li>
                                <?php } ?>

                            </ul>
                            </li><?php } ?>

                        <?php
                        if ($row_v39 > 0) {
                            //if(file_exists($pathv36)){//vol2n5
                            ?>
                            <li class="item "><a href="#" class="list-group-item">VOL. 3 N0. 9<span
                                        class="icon"> </span></a>
                            <ul>
                                <?php
                                while ($rowv39 = $stmtv39->fetch(PDO::FETCH_ASSOC)) {
                                    ?>
                                    <li class="list-group-item"><a class="items" style="color:#337ab7;"
                            href="abstract.php?j=<?php echo $rowv39['pub_journal'];?>&pn=<?php echo $rowv39['pub_name']; ?>&id=<?php echo $rowv39['id']; ?>" target="_blank"><span
                                                    class="glyphicon glyphicon-cloud-download"
                                                    aria-hidden="true"></span><?php echo $rowv39['pub_name']; ?></a>
                                        <p style="color:#FF590F;"> Author(s): <?php echo $rowv39['pub_author']; ?></p>
                                    </li>
                                <?php } ?>

                            </ul>
                            </li><?php } ?>

                        <?php
                        if ($row_v310 > 0) {
                            //if(file_exists($pathv310)){//vol2n5
                            ?>
                            <li class="item "><a href="#" class="list-group-item">VOL. 3 N0. 10<span
                                        class="icon"> </span></a>
                            <ul>
                                <?php
                                while ($rowv310 = $stmtv310->fetch(PDO::FETCH_ASSOC)) {
                                    ?>
                                    <li class="list-group-item"><a class="items" style="color:#337ab7;"
                                href="abstract.php?j=<?php echo $rowv310['pub_journal'];?>&pn=<?php echo $rowv310['pub_name']; ?>&id=<?php echo $rowv310['id']; ?>" target="_blank"><span
                                                    class="glyphicon glyphicon-cloud-download"
                                                    aria-hidden="true"></span><?php echo $rowv310['pub_name']; ?></a>
                                        <p style="color:#FF590F;"> Author(s): <?php echo $rowv310['pub_author']; ?></p>
                                    </li>
                                <?php } ?>

                            </ul>
                            </li><?php } ?>

                        <?php
                        if ($row_v311 > 0) {
                            //if(file_exists($pathv310)){//vol2n5
                            ?>
                            <li class="item "><a href="#" class="list-group-item">VOL. 3 N0. 11<span
                                        class="icon"> </span></a>
                            <ul>
                                <?php
                                while ($rowv311 = $stmtv311->fetch(PDO::FETCH_ASSOC)) {
                                    ?>
                                    <li class="list-group-item"><a class="items" style="color:#337ab7;"
                              href="abstract.php?j=<?php echo $rowv311['pub_journal'];?>&pn=<?php echo $rowv311['pub_name']; ?>&id=<?php echo $rowv311['id']; ?>" target="_blank"><span
                                                    class="glyphicon glyphicon-cloud-download"
                                                    aria-hidden="true"></span><?php echo $rowv311['pub_name']; ?></a>
                                        <p style="color:#FF590F;"> Author(s): <?php echo $rowv311['pub_author']; ?></p>
                                    </li>
                                <?php } ?>

                            </ul>
                            </li><?php } ?>

                        <?php
                        if ($row_v312 > 0) {
                            //if(file_exists($pathv310)){//vol2n5
                            ?>
                            <li class="item "><a href="#" class="list-group-item">VOL. 3 N0. 12<span
                                        class="icon"> </span></a>
                            <ul>
                                <?php
                                while ($rowv312 = $stmtv312->fetch(PDO::FETCH_ASSOC)) {
                                    ?>
                                    <li class="list-group-item"><a class="items" style="color:#337ab7;"
                                 href="abstract.php?j=<?php echo $rowv312['pub_journal'];?>&pn=<?php echo $rowv312['pub_name']; ?>&id=<?php echo $rowv312['id']; ?>" target="_blank"><span
                                                    class="glyphicon glyphicon-cloud-download"
                                                    aria-hidden="true"></span><?php echo $rowv312['pub_name']; ?></a>
                                        <p style="color:#FF590F;"> Author(s): <?php echo $rowv312['pub_author']; ?></p>
                                    </li>
                                <?php } ?>

                            </ul>
                            </li><?php } ?>

                        <?php
                        if ($row_v313 > 0) {
                            //if(file_exists($pathv310)){//vol2n5
                            ?>
                            <li class="item "><a href="#" class="list-group-item">VOL. 3 N0. 13<span
                                        class="icon"> </span></a>
                            <ul>
                                <?php
                                while ($rowv313 = $stmtv313->fetch(PDO::FETCH_ASSOC)) {
                                    ?>
                                    <li class="list-group-item"><a class="items" style="color:#337ab7;"
                               href="abstract.php?j=<?php echo $rowv313['pub_journal'];?>&pn=<?php echo $rowv313['pub_name']; ?>&id=<?php echo $rowv313['id']; ?>" target="_blank"><span
                                                    class="glyphicon glyphicon-cloud-download"
                                                    aria-hidden="true"></span><?php echo $rowv313['pub_name']; ?></a>
                                        <p style="color:#FF590F;"> Author(s): <?php echo $rowv313['pub_author']; ?></p>
                                    </li>
                                <?php } ?>

                            </ul>
                            </li><?php } ?>

                        <?php
                        if ($row_v41 > 0) {
                            //if(file_exists($pathv41)){//vol2n5
                            ?>
                            <li class="item "><a href="#" class="list-group-item">VOL. 4 N0. 1<span
                                            class="icon"> </span></a>
                                <ul>
                                    <?php
                                    while ($rowv41 = $stmtv41->fetch(PDO::FETCH_ASSOC)) {
                                        ?>
                                        <li class="list-group-item"><a class="items" style="color:#337ab7;"
                                href="abstract.php?j=<?php echo $rowv41['pub_journal'];?>&pn=<?php echo $rowv41['pub_name']; ?>&id=<?php echo $rowv41['id']; ?>" target="_blank"><span
                                                        class="glyphicon glyphicon-cloud-download"
                                                        aria-hidden="true"></span><?php echo $rowv41['pub_name']; ?></a>
                                            <p style="color:#FF590F;">
                                                Author(s): <?php echo $rowv41['pub_author']; ?></p></li>
                                    <?php } ?>

                                </ul>
                            </li>
                        <?php } ?>
                        <?php
                        if ($row_v42 > 0) {
                            //if(file_exists($pathv42)){//vol2n5
                            ?>
                            <li class="item "><a href="#" class="list-group-item">VOL. 4 N0. 2<span
                                        class="icon"> </span></a>
                            <ul>
                                <?php
                                while ($rowv42 = $stmtv42->fetch(PDO::FETCH_ASSOC)) {
                                    ?>
                                    <li class="list-group-item"><a class="items" style="color:#337ab7;"
                         href="abstract.php?j=<?php echo $rowv42['pub_journal'];?>&pn=<?php echo $rowv42['pub_name']; ?>&id=<?php echo $rowv42['id']; ?>" target="_blank"><span
                                                    class="glyphicon glyphicon-cloud-download"
                                                    aria-hidden="true"></span><?php echo $rowv42['pub_name']; ?></a>
                                        <p style="color:#FF590F;"> Author(s): <?php echo $rowv42['pub_author']; ?></p>
                                    </li>
                                <?php } ?>

                            </ul>
                            </li><?php }

                        if ($row_v43 > 0) {
                            //if(file_exists($pathv43)){//vol2n5
                            ?>
                            <li class="item "><a href="#" class="list-group-item">VOL. 4 N0. 3<span
                                        class="icon"> </span></a>
                            <ul>
                                <?php
                                while ($rowv43 = $stmtv43->fetch(PDO::FETCH_ASSOC)) {
                                    ?>
                                    <li class="list-group-item"><a class="items" style="color:#337ab7;"
                             href="abstract.php?j=<?php echo $rowv43['pub_journal'];?>&pn=<?php echo $rowv43['pub_name']; ?>&id=<?php echo $rowv43['id']; ?>" target="_blank"><span
                                                    class="glyphicon glyphicon-cloud-download"
                                                    aria-hidden="true"></span><?php echo $rowv43['pub_name']; ?></a>
                                        <p style="color:#FF590F;"> Author(s): <?php echo $rowv43['pub_author']; ?></p>
                                    </li>
                                <?php } ?>

                            </ul>
                            </li><?php }

                        if ($row_v44 > 0) {
                            //if(file_exists($pathv44)){//vol2n5
                            ?>
                            <li class="item "><a href="#" class="list-group-item">VOL. 4 N0. 4<span
                                        class="icon"> </span></a>
                            <ul>
                                <?php
                                while ($rowv44 = $stmtv44->fetch(PDO::FETCH_ASSOC)) {
                                    ?>
                                    <li class="list-group-item"><a class="items" style="color:#337ab7;"
                                 href="abstract.php?j=<?php echo $rowv44['pub_journal'];?>&pn=<?php echo $rowv44['pub_name']; ?>&id=<?php echo $rowv44['id']; ?>" target="_blank"><span
                                                    class="glyphicon glyphicon-cloud-download"
                                                    aria-hidden="true"></span><?php echo $rowv44['pub_name']; ?></a>
                                        <p style="color:#FF590F;"> Author(s): <?php echo $rowv44['pub_author']; ?></p>
                                    </li>
                                <?php } ?>

                            </ul>
                            </li><?php }

                        if ($row_v45 > 0) {
                            //if(file_exists($pathv45)){//vol2n5
                            ?>
                            <li class="item "><a href="#" class="list-group-item">VOL. 4 N0. 5<span
                                        class="icon"> </span></a>
                            <ul>
                                <?php
                                while ($rowv45 = $stmtv45->fetch(PDO::FETCH_ASSOC)) {
                                    ?>
                                    <li class="list-group-item"><a class="items" style="color:#337ab7;"
                                 href="abstract.php?j=<?php echo $rowv45['pub_journal'];?>&pn=<?php echo $rowv45['pub_name']; ?>&id=<?php echo $rowv45['id']; ?>" target="_blank"><span
                                                    class="glyphicon glyphicon-cloud-download"
                                                    aria-hidden="true"></span><?php echo $rowv45['pub_name']; ?></a>
                                        <p style="color:#FF590F;"> Author(s): <?php echo $rowv45['pub_author']; ?></p>
                                    </li>

                                <?php } ?>

                            </ul>
                            </li><?php }

                        if ($row_v46 > 0) {
                            //if(file_exists($pathv46)){//vol2n5
                            ?>
                            <li class="item "><a href="#" class="list-group-item">VOL. 4 N0. 6<span
                                        class="icon"> </span></a>
                            <ul>
                                <?php
                                while ($rowv46 = $stmtv46->fetch(PDO::FETCH_ASSOC)) {
                                    ?>
                                    <li class="list-group-item"><a class="items" style="color:#337ab7;"
                                    href="abstract.php?j=<?php echo $rowv46['pub_journal'];?>&pn=<?php echo $rowv46['pub_name']; ?>&id=<?php echo $rowv46['id']; ?>" target="_blank"><span
                                                    class="glyphicon glyphicon-cloud-download"
                                                    aria-hidden="true"></span><?php echo $rowv46['pub_name']; ?></a>
                                        <p style="color:#FF590F;"> Author(s): <?php echo $rowv46['pub_author']; ?></p>
                                    </li>

                                <?php } ?>

                            </ul>
                            </li><?php }

                        if ($row_v47 > 0) {
                            //if(file_exists($pathv47)){//vol2n5
                            ?>
                            <li class="item "><a href="#" class="list-group-item">VOL. 4 N0. 7<span
                                        class="icon"> </span></a>
                            <ul>
                                <?php
                                while ($rowv47 = $stmtv47->fetch(PDO::FETCH_ASSOC)) {
                                    ?>
                                    <li class="list-group-item"><a class="items" style="color:#337ab7;"
                                  href="abstract.php?j=<?php echo $rowv47['pub_journal'];?>&pn=<?php echo $rowv47['pub_name']; ?>&id=<?php echo $rowv47['id']; ?>" target="_blank"><span
                                                    class="glyphicon glyphicon-cloud-download"
                                                    aria-hidden="true"></span><?php echo $rowv47['pub_name']; ?></a>
                                        <p style="color:#FF590F;"> Author(s): <?php echo $rowv47['pub_author']; ?></p>
                                    </li>

                                <?php } ?>

                            </ul>
                            </li><?php }

                        if ($row_v48 > 0) {
                            //if(file_exists($pathv48)){//vol2n5
                            ?>
                            <li class="item "><a href="#" class="list-group-item">VOL. 4 N0. 8<span
                                        class="icon"> </span></a>
                            <ul>
                                <?php
                                while ($rowv48 = $stmtv48->fetch(PDO::FETCH_ASSOC)) {
                                    ?>
                                    <li class="list-group-item"><a class="items" style="color:#337ab7;"
                                href="abstract.php?j=<?php echo $rowv48['pub_journal'];?>&pn=<?php echo $rowv48['pub_name']; ?>&id=<?php echo $rowv48['id']; ?>" target="_blank"><span
                                                    class="glyphicon glyphicon-cloud-download"
                                                    aria-hidden="true"></span><?php echo $rowv48['pub_name']; ?></a>
                                        <p style="color:#FF590F;"> Author(s): <?php echo $rowv48['pub_author']; ?></p>
                                    </li>

                                <?php } ?>

                            </ul>
                            </li><?php }
                           
                        if ($row_v49 > 0) {
                            //if(file_exists($pathv49)){//vol2n5
                            ?>
                            <li class="item "><a href="#" class="list-group-item">VOL. 4 N0. 9<span
                                        class="icon"> </span></a>
                            <ul>
                                <?php
                                while ($rowv49 = $stmtv49->fetch(PDO::FETCH_ASSOC)) {
                                    ?>
                                    <li class="list-group-item"><a class="items" style="color:#337ab7;"
                                 href="abstract.php?j=<?php echo $rowv49['pub_journal'];?>&pn=<?php echo $rowv49['pub_name']; ?>&id=<?php echo $rowv49['id']; ?>" target="_blank"><span
                                                    class="glyphicon glyphicon-cloud-download"
                                                    aria-hidden="true"></span><?php echo $rowv49['pub_name']; ?></a>
                                        <p style="color:#FF590F;"> Author(s): <?php echo $rowv49['pub_author']; ?></p>
                                    </li>

                                <?php } ?>

                            </ul>
                            </li><?php }
                            
                             if ($row_v51 > 0) {
                            //if(file_exists($pathv48)){//vol2n5
                            ?>
                            <li class="item "><a href="#" class="list-group-item">VOL. 5 N0. 1<span
                                        class="icon"> </span></a>
                            <ul>
                                <?php
                                while ($rowv51 = $stmtv51->fetch(PDO::FETCH_ASSOC)) {
                                    ?>
                                    <li class="list-group-item"><a class="items" style="color:#337ab7;"
                                   href="abstract.php?j=<?php echo $rowv51['pub_journal'];?>&pn=<?php echo $rowv51['pub_name']; ?>&id=<?php echo $rowv51['id']; ?>" target="_blank"><span
                                                    class="glyphicon glyphicon-cloud-download"
                                                    aria-hidden="true"></span><?php echo $rowv51['pub_name']; ?></a>
                                        <p style="color:#FF590F;"> Author(s): <?php echo $rowv51['pub_author']; ?></p>
                                    </li>

                                <?php } ?>

                            </ul>
                            </li><?php }
                            
                             if ($row_v52 > 0) {
                            //if(file_exists($pathv48)){//vol2n5
                            ?>
                            <li class="item "><a href="#" class="list-group-item">VOL. 5 N0. 2<span
                                        class="icon"> </span></a>
                            <ul>
                                <?php
                                while ($rowv52 = $stmtv52->fetch(PDO::FETCH_ASSOC)) {
                                    ?>
                                    <li class="list-group-item"><a class="items" style="color:#337ab7;"
                             href="abstract.php?j=<?php echo $rowv52['pub_journal'];?>&pn=<?php echo $rowv52['pub_name']; ?>&id=<?php echo $rowv52['id']; ?>" target="_blank"><span
                                                    class="glyphicon glyphicon-cloud-download"
                                                    aria-hidden="true"></span><?php echo $rowv52['pub_name']; ?></a>
                                        <p style="color:#FF590F;"> Author(s): <?php echo $rowv52['pub_author']; ?></p>
                                    </li>

                                <?php } ?>

                            </ul>
                            </li><?php }

                            if ($row_v53 > 0) {
                            //if(file_exists($pathv53)){//vol2n5
                            ?>
                            <li class="item "><a href="#" class="list-group-item">VOL. 5 N0. 3<span
                                        class="icon"> </span></a>
                            <ul>
                                <?php
                                while ($rowv53 = $stmtv53->fetch(PDO::FETCH_ASSOC)) {
                                    ?>
                                    <li class="list-group-item"><a class="items" style="color:#337ab7;"
                                  href="abstract.php?j=<?php echo $rowv53['pub_journal'];?>&pn=<?php echo $rowv53['pub_name']; ?>&id=<?php echo $rowv53['id']; ?>" target="_blank"><span
                                                    class="glyphicon glyphicon-cloud-download"
                                                    aria-hidden="true"></span><?php echo $rowv53['pub_name']; ?></a>
                                        <p style="color:#FF590F;"> Author(s): <?php echo $rowv53['pub_author']; ?></p>
                                    </li>

                                <?php } ?>

                            </ul>
                            </li><?php }

                            if ($row_v54 > 0) {
                            //if(file_exists($pathv54)){//vol2n5
                            ?>
                            <li class="item "><a href="#" class="list-group-item">VOL. 5 N0. 4<span
                                        class="icon"> </span></a>
                            <ul>
                                <?php
                                while ($rowv54 = $stmtv54->fetch(PDO::FETCH_ASSOC)) {
                                    ?>
                                    <li class="list-group-item"><a class="items" style="color:#337ab7;"
                             href="abstract.php?j=<?php echo $rowv54['pub_journal'];?>&pn=<?php echo $rowv54['pub_name']; ?>&id=<?php echo $rowv54['id']; ?>" target="_blank"><span
                                                    class="glyphicon glyphicon-cloud-download"
                                                    aria-hidden="true"></span><?php echo $rowv54['pub_name']; ?></a>
                                        <p style="color:#FF590F;"> Author(s): <?php echo $rowv54['pub_author']; ?></p>
                                    </li>

                                <?php } ?>

                            </ul>
                            </li><?php }
                            
                             if ($row_v55 > 0) {
                            //if(file_exists($pathv55)){//vol2n5
                            ?>
                            <li class="item "><a href="#" class="list-group-item">VOL. 5 N0. 5<span
                                        class="icon"> </span></a>
                            <ul>
                                <?php
                                while ($rowv55 = $stmtv55->fetch(PDO::FETCH_ASSOC)) {
                                    ?>
                                    <li class="list-group-item"><a class="items" style="color:#337ab7;"
                            href="abstract.php?j=<?php echo $rowv55['pub_journal'];?>&pn=<?php echo $rowv55['pub_name']; ?>&id=<?php echo $rowv55['id']; ?>" target="_blank"><span
                                                    class="glyphicon glyphicon-cloud-download"
                                                    aria-hidden="true"></span><?php echo $rowv55['pub_name']; ?></a>
                                        <p style="color:#FF590F;"> Author(s): <?php echo $rowv55['pub_author']; ?></p>
                                    </li>

                                <?php } ?>

                            </ul>
                            </li><?php }
                            
                             if ($row_v56 > 0) {
                            //if(file_exists($pathv55)){//vol2n5
                            ?>
                            <li class="item "><a href="#" class="list-group-item">VOL. 5 N0. 6<span
                                        class="icon"> </span></a>
                            <ul>
                                <?php
                                while ($rowv56 = $stmtv56->fetch(PDO::FETCH_ASSOC)) {
                                    ?>
                                    <li class="list-group-item"><a class="items" style="color:#337ab7;"
                           href="abstract.php?j=<?php echo $rowv56['pub_journal'];?>&pn=<?php echo $rowv56['pub_name']; ?>&id=<?php echo $rowv56['id']; ?>" target="_blank"><span
                                                    class="glyphicon glyphicon-cloud-download"
                                                    aria-hidden="true"></span><?php echo $rowv56['pub_name']; ?></a>
                                        <p style="color:#FF590F;"> Author(s): <?php echo $rowv56['pub_author']; ?></p>
                                    </li>

                                <?php } ?>

                            </ul>
                            </li><?php }
                            
                              if ($row_v57 > 0) {
                            //if(file_exists($pathv55)){//vol2n5
                            ?>
                            <li class="item "><a href="#" class="list-group-item">VOL. 5 N0. 7<span
                                        class="icon"> </span></a>
                            <ul>
                                <?php
                                while ($rowv57 = $stmtv57->fetch(PDO::FETCH_ASSOC)) {
                                    ?>
                                    <li class="list-group-item"><a class="items" style="color:#337ab7;"
                            href="abstract.php?j=<?php echo $rowv57['pub_journal'];?>&pn=<?php echo $rowv57['pub_name']; ?>&id=<?php echo $rowv57['id']; ?>" target="_blank"><span
                                                    class="glyphicon glyphicon-cloud-download"
                                                    aria-hidden="true"></span><?php echo $rowv57['pub_name']; ?></a>
                                        <p style="color:#FF590F;"> Author(s): <?php echo $rowv57['pub_author']; ?></p>
                                    </li>

                                <?php } ?>

                            </ul>
                            </li><?php }
                              if ($row_v61 > 0) {
                            //if(file_exists($pathv55)){//vol2n5
                            ?>
                            <li class="item "><a href="#" class="list-group-item">VOL. 6 N0. 1<span
                                        class="icon"> </span></a>
                            <ul>
                                <?php
                                while ($rowv61 = $stmtv61->fetch(PDO::FETCH_ASSOC)) {
                                    ?>
                                    <li class="list-group-item"><a class="items" style="color:#337ab7;"
                               href="abstract.php?j=<?php echo $rowv61['pub_journal'];?>&pn=<?php echo $rowv61['pub_name']; ?>&id=<?php echo $rowv61['id']; ?>" target="_blank"><span
                                                    class="glyphicon glyphicon-cloud-download"
                                                    aria-hidden="true"></span><?php echo $rowv61['pub_name']; ?></a>
                                        <p style="color:#FF590F;"> Author(s): <?php echo $rowv61['pub_author']; ?></p>
                                    </li>

                                <?php } ?>

                            </ul>
                            </li><?php }
                            
                              if ($row_v62 > 0) {
                            //if(file_exists($pathv55)){//vol2n5
                            ?>
                            <li class="item "><a href="#" class="list-group-item">VOL. 6 N0. 2<span
                                        class="icon"> </span></a>
                            <ul>
                                <?php
                                while ($rowv62 = $stmtv62->fetch(PDO::FETCH_ASSOC)) {
                                    ?>
                                    <li class="list-group-item"><a class="items" style="color:#337ab7;"
                                 href="abstract.php?j=<?php echo $rowv62['pub_journal'];?>&pn=<?php echo $rowv62['pub_name']; ?>&id=<?php echo $rowv62['id']; ?>" target="_blank"><span
                                                    class="glyphicon glyphicon-cloud-download"
                                                    aria-hidden="true"></span><?php echo $rowv62['pub_name']; ?></a>
                                        <p style="color:#FF590F;"> Author(s): <?php echo $rowv62['pub_author']; ?></p>
                                    </li>

                                <?php } ?>

                            </ul>
                            </li><?php }
                            
                              if ($row_v63 > 0) {
                            //if(file_exists($pathv55)){//vol2n5
                            ?>
                            <li class="item "><a href="#" class="list-group-item">VOL. 6 N0. 3<span
                                        class="icon"> </span></a>
                            <ul>
                                <?php
                                while ($rowv63 = $stmtv63->fetch(PDO::FETCH_ASSOC)) {
                                    ?>
                                    <li class="list-group-item"><a class="items" style="color:#337ab7;"
                               href="abstract.php?j=<?php echo $rowv63['pub_journal'];?>&pn=<?php echo $rowv63['pub_name']; ?>&id=<?php echo $rowv63['id']; ?>" target="_blank"><span
                                                    class="glyphicon glyphicon-cloud-download"
                                                    aria-hidden="true"></span><?php echo $rowv63['pub_name']; ?></a>
                                        <p style="color:#FF590F;"> Author(s): <?php echo $rowv63['pub_author']; ?></p>
                                    </li>

                                <?php } ?>

                            </ul>
                            </li><?php }
                            
                            
                              if ($row_v64 > 0) {
                            //if(file_exists($pathv55)){//vol2n5
                            ?>
                            <li class="item "><a href="#" class="list-group-item">VOL. 6 N0. 4<span
                                        class="icon"> </span></a>
                            <ul>
                                <?php
                                while ($rowv64 = $stmtv64->fetch(PDO::FETCH_ASSOC)) {
                                    ?>
                                    <li class="list-group-item"><a class="items" style="color:#337ab7;"
                             href="abstract.php?j=<?php echo $rowv64['pub_journal'];?>&pn=<?php echo $rowv64['pub_name']; ?>&id=<?php echo $rowv64['id']; ?>" target="_blank"><span
                                                    class="glyphicon glyphicon-cloud-download"
                                                    aria-hidden="true"></span><?php echo $rowv64['pub_name']; ?></a>
                                        <p style="color:#FF590F;"> Author(s): <?php echo $rowv64['pub_author']; ?></p>
                                    </li>

                                <?php } ?>

                            </ul>
                            </li><?php }
                            
                            if ($row_v65 > 0) {
                            //if(file_exists($pathv55)){//vol2n5
                            ?>
                            <li class="item "><a href="#" class="list-group-item">VOL. 6 N0. 5<span
                                        class="icon"> </span></a>
                            <ul>
                                <?php
                                while ($rowv65 = $stmtv65->fetch(PDO::FETCH_ASSOC)) {
                                    ?>
                                    <li class="list-group-item"><a class="items" style="color:#337ab7;"
                               href="abstract.php?j=<?php echo $rowv65['pub_journal'];?>&pn=<?php echo $rowv65['pub_name']; ?>&id=<?php echo $rowv65['id']; ?>" target="_blank"><span
                                                    class="glyphicon glyphicon-cloud-download"
                                                    aria-hidden="true"></span><?php echo $rowv65['pub_name']; ?></a>
                                        <p style="color:#FF590F;"> Author(s): <?php echo $rowv65['pub_author']; ?></p>
                                    </li>

                                <?php } ?>

                            </ul>
                            </li><?php }
                            
                            
                            if ($row_v71 > 0) {
                            //if(file_exists($pathv55)){//vol2n5
                            ?>
                            <li class="item "><a href="#" class="list-group-item">VOL. 7 N0. 1<span
                                        class="icon"> </span></a>
                            <ul>
                                <?php
                                while ($rowv71 = $stmtv71->fetch(PDO::FETCH_ASSOC)) {
                                    ?>
                                    <li class="list-group-item"><a class="items" style="color:#337ab7;"
                        href="abstract.php?j=<?php echo $rowv71['pub_journal'];?>&pn=<?php echo $rowv71['pub_name']; ?>&id=<?php echo $rowv71['id']; ?>" target="_blank"><span
                                                    class="glyphicon glyphicon-cloud-download"
                                                    aria-hidden="true"></span><?php echo $rowv71['pub_name']; ?></a>
                                        <p style="color:#FF590F;"> Author(s): <?php echo $rowv71['pub_author']; ?></p>
                                    </li>

                                <?php } ?>

                            </ul>
                            </li><?php }
    

                            if ($row_v72 > 0) {
                            //if(file_exists($pathv55)){//vol2n5
                            ?>
                            <li class="item "><a href="#" class="list-group-item">VOL. 7 N0. 2<span
                                        class="icon"> </span></a>
                            <ul>
                                <?php
                                while ($rowv72 = $stmtv72->fetch(PDO::FETCH_ASSOC)) {
                                    ?>
                                    <li class="list-group-item"><a class="items" style="color:#337ab7;"
                                href="abstract.php?j=<?php echo $rowv72['pub_journal'];?>&pn=<?php echo $rowv72['pub_name']; ?>&id=<?php echo $rowv72['id']; ?>" target="_blank"><span
                                                    class="glyphicon glyphicon-cloud-download"
                                                    aria-hidden="true"></span><?php echo $rowv72['pub_name']; ?></a>
                                        <p style="color:#FF590F;"> Author(s): <?php echo $rowv72['pub_author']; ?></p>
                                    </li>

                                <?php } ?>

                            </ul>
                            </li><?php }

                            if ($row_v73 > 0) {
                            //if(file_exists($pathv55)){//vol2n5
                            ?>
                            <li class="item "><a href="#" class="list-group-item">VOL. 7 N0. 3<span
                                        class="icon"> </span></a>
                            <ul>
                                <?php
                                while ($rowv73 = $stmtv73->fetch(PDO::FETCH_ASSOC)) {
                                    ?>
                                    <li class="list-group-item"><a class="items" style="color:#337ab7;"
                                   href="abstract.php?j=<?php echo $rowv73['pub_journal'];?>&pn=<?php echo $rowv73['pub_name']; ?>&id=<?php echo $rowv73['id']; ?>" target="_blank"><span
                                                    class="glyphicon glyphicon-cloud-download"
                                                    aria-hidden="true"></span><?php echo $rowv73['pub_name']; ?></a>
                                        <p style="color:#FF590F;"> Author(s): <?php echo $rowv73['pub_author']; ?></p>
                                    </li>

                                <?php } ?>

                            </ul>
                            </li><?php }


                            
    
                            if ($row_v74 > 0) {
                            //if(file_exists($pathv55)){//vol2n5
                            ?>
                            <li class="item "><a href="#" class="list-group-item">VOL. 7 N0. 4<span
                                        class="icon"> </span></a>
                            <ul>
                                <?php
                                while ($rowv74 = $stmtv74->fetch(PDO::FETCH_ASSOC)) {
                                    ?>
                                    <li class="list-group-item"><a class="items" style="color:#337ab7;"
                                 href="abstract.php?j=<?php echo $rowv74['pub_journal'];?>&pn=<?php echo $rowv74['pub_name']; ?>&id=<?php echo $rowv74['id']; ?>" target="_blank"><span
                                                    class="glyphicon glyphicon-cloud-download"
                                                    aria-hidden="true"></span><?php echo $rowv74['pub_name']; ?></a>
                                        <p style="color:#FF590F;"> Author(s): <?php echo $rowv74['pub_author']; ?></p>
                                    </li>

                                <?php } ?>

                            </ul>
                            </li><?php }

                            if ($row_v75 > 0) {
                            //added my DUMKA BIPNELO  ON MAY 26 where i started my code from  
                            ?>
                            <li class="item "><a href="#" class="list-group-item">VOL. 7 N0. 5<span
                                        class="icon"> </span></a>
                            <ul>
                                <?php
                                while ($rowv75 = $stmtv75->fetch(PDO::FETCH_ASSOC)) {
                                    ?>
                                    <li class="list-group-item"><a  class="items" style="color:#337ab7;"
                        href="abstract.php?j=<?php echo $rowv75['pub_journal'];?>&pn=<?php echo $rowv75['pub_name']; ?>&id=<?php echo $rowv75['id']; ?>" target="_blank"><span
                                                    class="glyphicon glyphicon-cloud-download"
                                                    aria-hidden="true" onclick="document.getElementById('abstractc')"></span><?php echo $rowv75['pub_name']; ?></a>
                                        <p style="color:#FF590F;"> Author(s): <?php echo $rowv75['pub_author']; ?></p>
                                    </li>

                                <?php } ?>

                            </ul> 
                            </li><?php }


if ($row_v76 > 0) {
                            //added my DUMKA BIPNELO  ON MAY 26 where i started my code from  
                            ?>
                            <li class="item "><a href="#" class="list-group-item">VOL. 7 N0. 6<span
                                        class="icon"> </span></a>
                            <ul>
                                <?php
                                while ($rowv76 = $stmtv76->fetch(PDO::FETCH_ASSOC)) {
                                    ?>
                                    <li class="list-group-item"><a  class="items" style="color:#337ab7;"
                        href="abstract.php?j=<?php echo $rowv76['pub_journal'];?>&pn=<?php echo $rowv76['pub_name']; ?>&id=<?php echo $rowv76['id']; ?>" target="_blank"><span
                                                    class="glyphicon glyphicon-cloud-download"
                                                    aria-hidden="true" onclick="document.getElementById('abstractc')"></span><?php echo $rowv76['pub_name']; ?></a>
                                        <p style="color:#FF590F;"> Author(s): <?php echo $rowv76['pub_author']; ?></p>
                                    </li>

                                <?php } ?>

                            </ul> 
                            </li><?php }

                            if ($row_v81 > 0) {
                            //if(file_exists($pathv55)){//vol2n5 imposed my DUMKA BIPNELO  continues 
                            ?>
                            <li class="item "><a href="#" class="list-group-item">VOL. 8 N0. 1<span
                                        class="icon"> </span></a>
                            <ul>
                                <?php
                                while ($rowv81 = $stmtv81->fetch(PDO::FETCH_ASSOC)) {
                                    ?>
                                    <li class="list-group-item"><a class="items" style="color:#337ab7;"
                        href="abstract.php?j=<?php echo $rowv81['pub_journal'];?>&pn=<?php echo $rowv81['pub_name']; ?>&id=<?php echo $rowv81['id']; ?>" target="_blank"><span
                                                    class="glyphicon glyphicon-cloud-download"
                                                    aria-hidden="true"></span><?php echo $rowv81['pub_name']; ?></a>
                                        <p style="color:#FF590F;"> Author(s): <?php echo $rowv81['pub_author']; ?></p>
                                    </li>

                                <?php } ?>

                            </ul>
                            </li><?php }



                            if ($row_v82 > 0) {
                            //if(file_exists($pathv55)){//vol2n5 imposed my DUMKA BIPNELO  continues 
                            ?>
                            <li class="item "><a href="#" class="list-group-item">VOL. 8 N0. 2<span
                                        class="icon"> </span></a>
                            <ul>
                                <?php
                                while ($rowv82 = $stmtv82->fetch(PDO::FETCH_ASSOC)) {
                                    ?>
                                    <li class="list-group-item"><a  class="items" style="color:#337ab7;"
                               href="abstract.php?j=<?php echo $rowv82['pub_journal'];?>&pn=<?php echo $rowv82['pub_name']; ?>&id=<?php echo $rowv82['id']; ?>" target="_blank"><span
                                                    class="glyphicon glyphicon-cloud-download"
                                                    aria-hidden="true"></span><?php echo $rowv82['pub_name']; ?></a>
                                        <p style="color:#FF590F;"> Author(s): <?php echo $rowv82['pub_author']; ?></p>
                                    </li>

                                <?php } ?>

                            </ul>
                            </li><?php }

                            if ($row_v83 > 0) {
                            //if(file_exists($pathv55)){//vol2n5 imposed my DUMKA BIPNELO  continues 
                            ?>
                            <li class="item "><a href="#" class="list-group-item">VOL. 8 N0. 3<span
                                        class="icon"> </span></a>
                            <ul>
                                <?php
                                while ($rowv83 = $stmtv83->fetch(PDO::FETCH_ASSOC)) {
                                    ?>
                                    <li class="list-group-item"><a class="items" style="color:#337ab7;"
                        href="abstract.php?j=<?php echo $rowv83['pub_journal'];?>&pn=<?php echo $rowv83['pub_name']; ?>&id=<?php echo $rowv83['id']; ?>" target="_blank"><span
                                                    class="glyphicon glyphicon-cloud-download"
                                                    aria-hidden="true"></span><?php echo $rowv83['pub_name']; ?></a>
                                        <p style="color:#FF590F;"> Author(s): <?php echo $rowv83['pub_author']; ?></p>
                                    </li>

                                <?php } ?>

                            </ul>
                            </li><?php }


                            if ($row_v84 > 0) {
                            //if(file_exists($pathv55)){//vol2n5 imposed my DUMKA BIPNELO  continues 
                            ?>
                            <li class="item "><a href="#" class="list-group-item">VOL. 8 N0. 4<span
                                        class="icon"> </span></a>
                            <ul>
                                <?php
                                while ($rowv84 = $stmtv84->fetch(PDO::FETCH_ASSOC)) {
                                    ?>
                                    <li class="list-group-item"><a  class="items" style="color:#337ab7;"
                               href="abstract.php?j=<?php echo $rowv84['pub_journal'];?>&pn=<?php echo $rowv84['pub_name']; ?>&id=<?php echo $rowv84['id']; ?>" target="_blank"><span
                                                    class="glyphicon glyphicon-cloud-download"
                                                    aria-hidden="true"></span><?php echo $rowv84['pub_name']; ?></a>
                                        <p style="color:#FF590F;"> Author(s): <?php echo $rowv84['pub_author']; ?></p>
                                    </li>

                                <?php } ?>

                            </ul>
                            </li><?php }



                            if ($row_v85 > 0) {
                            //if(file_exists($pathv55)){//vol2n5 imposed my DUMKA BIPNELO  continues 
                            ?>
                            <li class="item "><a href="#" class="list-group-item">VOL. 8 N0. 5<span
                                        class="icon"> </span></a>
                            <ul>
                                <?php
                                while ($rowv85 = $stmtv85->fetch(PDO::FETCH_ASSOC)) {
                                    ?>
                                    <li class="list-group-item"><a  class="items" style="color:#337ab7;"
                               href="abstract.php?j=<?php echo $rowv85['pub_journal'];?>&pn=<?php echo $rowv85['pub_name']; ?>&id=<?php echo $rowv85['id']; ?>" target="_blank"><span
                                                    class="glyphicon glyphicon-cloud-download"
                                                    aria-hidden="true"></span><?php echo $rowv85['pub_name']; ?></a>
                                        <p style="color:#FF590F;"> Author(s): <?php echo $rowv85['pub_author']; ?></p>
                                    </li>

                                <?php } ?>




                            </ul>
                            </li><?php }



                            if ($row_v86 > 0) {
                            //if(file_exists($pathv55)){//vol2n5 imposed my DUMKA BIPNELO  continues 
                            ?>
                            <li class="item "><a href="#" class="list-group-item">VOL. 8 N0. 6<span
                                        class="icon"> </span></a>
                            <ul>
                                <?php
                                while ($rowv86 = $stmtv86->fetch(PDO::FETCH_ASSOC)) {
                                    ?>
                                    <li class="list-group-item"><a  class="items" style="color:#337ab7;"
                               href="abstract.php?j=<?php echo $rowv86['pub_journal'];?>&pn=<?php echo $rowv86['pub_name']; ?>&id=<?php echo $rowv86['id']; ?>" target="_blank"><span
                                                    class="glyphicon glyphicon-cloud-download"
                                                    aria-hidden="true"></span><?php echo $rowv86['pub_name']; ?></a>
                                        <p style="color:#FF590F;"> Author(s): <?php echo $rowv86['pub_author']; ?></p>
                                    </li>

                                <?php } ?>

                            </ul>
                            </li><?php }


                            if ($row_v87 > 0) {
                            //if(file_exists($pathv55)){//vol2n5 imposed my DUMKA BIPNELO  continues 
                            ?>
                            <li class="item "><a href="#" class="list-group-item">VOL. 8 N0. 7<span
                                        class="icon"> </span></a>
                            <ul>
                                <?php
                                while ($rowv87 = $stmtv87->fetch(PDO::FETCH_ASSOC)) {
                                    ?>
                                    <li class="list-group-item"><a  class="items" style="color:#337ab7;"
                               href="abstract.php?j=<?php echo $rowv87['pub_journal'];?>&pn=<?php echo $rowv87['pub_name']; ?>&id=<?php echo $rowv87['id']; ?>" target="_blank"><span
                                                    class="glyphicon glyphicon-cloud-download"
                                                    aria-hidden="true"></span><?php echo $rowv87['pub_name']; ?></a>
                                        <p style="color:#FF590F;"> Author(s): <?php echo $rowv87['pub_author']; ?></p>
                                    </li>

                                <?php } ?>

                            </ul>
                            </li><?php }



                            if ($row_v88 > 0) {
                            //if(file_exists($pathv55)){//vol2n5 imposed my DUMKA BIPNELO  continues 
                            ?>
                            <li class="item "><a href="#" class="list-group-item">VOL. 8 N0. 8<span
                                        class="icon"> </span></a>
                            <ul>
                                <?php
                                while ($rowv88 = $stmtv88->fetch(PDO::FETCH_ASSOC)) {
                                    ?>
                                    <li class="list-group-item"><a  class="items" style="color:#337ab7;"
                               href="abstract.php?j=<?php echo $rowv88['pub_journal'];?>&pn=<?php echo $rowv88['pub_name']; ?>&id=<?php echo $rowv88['id']; ?>" target="_blank"><span
                                                    class="glyphicon glyphicon-cloud-download"
                                                    aria-hidden="true"></span><?php echo $rowv88['pub_name']; ?></a>
                                        <p style="color:#FF590F;"> Author(s): <?php echo $rowv88['pub_author']; ?></p>
                                    </li>

                                <?php } ?>

                            </ul>
                            </li><?php }

                            if ($row_v91 > 0) {
                            //if(file_exists($pathv55)){//vol2n5 imposed my DUMKA BIPNELO  continues 
                            ?>
                            <li class="item "><a href="#" class="list-group-item">VOL. 9 N0. 1<span
                                        class="icon"> </span></a>
                            <ul>
                                <?php
                                while ($rowv91 = $stmtv91->fetch(PDO::FETCH_ASSOC)) {
                                    ?>
                                    <li class="list-group-item"><a  class="items" style="color:#337ab7;"
                               href="abstract.php?j=<?php echo $rowv91['pub_journal'];?>&pn=<?php echo $rowv91['pub_name']; ?>&id=<?php echo $rowv91['id']; ?>" target="_blank"><span
                                                    class="glyphicon glyphicon-cloud-download"
                                                    aria-hidden="true"></span><?php echo $rowv91['pub_name']; ?></a>
                                        <p style="color:#FF590F;"> Author(s): <?php echo $rowv91['pub_author']; ?></p>
                                    </li>

                                <?php } ?>

                            </ul>
                            </li><?php }


                             if ($row_v92 > 0) {
                            //if(file_exists($pathv55)){//vol2n5 imposed my DUMKA BIPNELO  continues 
                            ?>
                            <li class="item "><a href="#" class="list-group-item">VOL. 9 N0. 2<span
                                        class="icon"> </span></a>
                            <ul>
                                <?php
                                while ($rowv92 = $stmtv92->fetch(PDO::FETCH_ASSOC)) {
                                    ?>
                                    <li class="list-group-item"><a  class="items" style="color:#337ab7;"
                               href="abstract.php?j=<?php echo $rowv92['pub_journal'];?>&pn=<?php echo $rowv92['pub_name']; ?>&id=<?php echo $rowv92['id']; ?>" target="_blank"><span
                                                    class="glyphicon glyphicon-cloud-download"
                                                    aria-hidden="true"></span><?php echo $rowv92['pub_name']; ?></a>
                                        <p style="color:#FF590F;"> Author(s): <?php echo $rowv92['pub_author']; ?></p>
                                    </li>

                                <?php } ?>

                            </ul>
                            </li><?php }

                             if ($row_v93 > 0) {
                            //if(file_exists($pathv55)){//vol2n5 imposed my DUMKA BIPNELO  continues 
                            ?>
                            <li class="item "><a href="#" class="list-group-item">VOL. 9 N0. 3<span
                                        class="icon"> </span></a>
                            <ul>
                                <?php
                                while ($rowv93 = $stmtv93->fetch(PDO::FETCH_ASSOC)) {
                                    ?>
                                    <li class="list-group-item"><a  class="items" style="color:#337ab7;"
                               href="abstract.php?j=<?php echo $rowv93['pub_journal'];?>&pn=<?php echo $rowv93['pub_name']; ?>&id=<?php echo $rowv93['id']; ?>" target="_blank"><span
                                                    class="glyphicon glyphicon-cloud-download"
                                                    aria-hidden="true"></span><?php echo $rowv93['pub_name']; ?></a>
                                        <p style="color:#FF590F;"> Author(s): <?php echo $rowv93['pub_author']; ?></p>
                                    </li>

                                <?php } ?>

                            </ul>
                            </li><?php }

                            if ($row_v94 > 0) {
                            //if(file_exists($pathv55)){//vol2n5 imposed my DUMKA BIPNELO  continues 
                            ?>
                            <li class="item "><a href="#" class="list-group-item">VOL. 9 N0. 4<span
                                        class="icon"> </span></a>
                            <ul>
                                <?php
                                while ($rowv94 = $stmtv94->fetch(PDO::FETCH_ASSOC)) {
                                    ?>
                                    <li class="list-group-item"><a  class="items" style="color:#337ab7;"
                               href="abstract.php?j=<?php echo $rowv94['pub_journal'];?>&pn=<?php echo $rowv94['pub_name']; ?>&id=<?php echo $rowv94['id']; ?>" target="_blank"><span
                                                    class="glyphicon glyphicon-cloud-download"
                                                    aria-hidden="true"></span><?php echo $rowv94['pub_name']; ?></a>
                                        <p style="color:#FF590F;"> Author(s): <?php echo $rowv94['pub_author']; ?></p>
                                    </li>

                                <?php } ?>

                            </ul>
                            </li><?php }


                              if ($row_v95 > 0) {
                            //if(file_exists($pathv55)){//vol2n5 imposed my DUMKA BIPNELO  continues 
                            ?>
                            <li class="item "><a href="#" class="list-group-item">VOL. 9 N0. 5<span
                                        class="icon"> </span></a>
                            <ul>
                                <?php
                                while ($rowv95 = $stmtv95->fetch(PDO::FETCH_ASSOC)) {
                                    ?>
                                    <li class="list-group-item"><a  class="items" style="color:#337ab7;"
                               href="abstract.php?j=<?php echo $rowv95['pub_journal'];?>&pn=<?php echo $rowv95['pub_name']; ?>&id=<?php echo $rowv95['id']; ?>" target="_blank"><span
                                                    class="glyphicon glyphicon-cloud-download"
                                                    aria-hidden="true"></span><?php echo $rowv95['pub_name']; ?></a>
                                        <p style="color:#FF590F;"> Author(s): <?php echo $rowv95['pub_author']; ?></p>
                                    </li>

                                <?php } ?>

                            </ul>
                            </li><?php }


                            if ($row_v96 > 0) {
                            //if(file_exists($pathv55)){//vol2n5 imposed my DUMKA BIPNELO  continues 
                            ?>
                            <li class="item "><a href="#" class="list-group-item">VOL. 9 N0. 6<span
                                        class="icon"> </span></a>
                            <ul>
                                <?php
                                while ($rowv96 = $stmtv96->fetch(PDO::FETCH_ASSOC)) {
                                    ?>
                                    <li class="list-group-item"><a  class="items" style="color:#337ab7;"
                               href="abstract.php?j=<?php echo $rowv96['pub_journal'];?>&pn=<?php echo $rowv96['pub_name']; ?>&id=<?php echo $rowv96['id']; ?>" target="_blank"><span
                                                    class="glyphicon glyphicon-cloud-download"
                                                    aria-hidden="true"></span><?php echo $rowv96['pub_name']; ?></a>
                                        <p style="color:#FF590F;"> Author(s): <?php echo $rowv96['pub_author']; ?></p>
                                    </li>

                                <?php } ?>

                            </ul>
                            </li><?php }


                             if ($row_v97 > 0) {
                            //if(file_exists($pathv55)){//vol2n5 imposed my DUMKA BIPNELO  continues 
                            ?>
                            <li class="item "><a href="#" class="list-group-item">VOL. 9 N0. 7<span
                                        class="icon"> </span></a>
                            <ul>
                                <?php
                                while ($rowv97 = $stmtv97->fetch(PDO::FETCH_ASSOC)) {
                                    ?>
                                    <li class="list-group-item"><a  class="items" style="color:#337ab7;"
                               href="abstract.php?j=<?php echo $rowv97['pub_journal'];?>&pn=<?php echo $rowv97['pub_name']; ?>&id=<?php echo $rowv97['id']; ?>" target="_blank"><span
                                                    class="glyphicon glyphicon-cloud-download"
                                                    aria-hidden="true"></span><?php echo $rowv97['pub_name']; ?></a>
                                        <p style="color:#FF590F;"> Author(s): <?php echo $rowv97['pub_author']; ?></p>
                                    </li>

                                <?php } ?>

                            </ul>
                            </li><?php }



                             if ($row_v98 > 0) {
                            //if(file_exists($pathv55)){//vol2n5 imposed my DUMKA BIPNELO  continues 
                            ?>
                            <li class="item "><a href="#" class="list-group-item">VOL. 9 N0. 8<span
                                        class="icon"> </span></a>
                            <ul>
                                <?php
                                while ($rowv98 = $stmtv98->fetch(PDO::FETCH_ASSOC)) {
                                    ?>
                                    <li class="list-group-item"><a  class="items" style="color:#337ab7;"
                               href="abstract.php?j=<?php echo $rowv98['pub_journal'];?>&pn=<?php echo $rowv98['pub_name']; ?>&id=<?php echo $rowv98['id']; ?>" target="_blank"><span
                                                    class="glyphicon glyphicon-cloud-download"
                                                    aria-hidden="true"></span><?php echo $rowv98['pub_name']; ?></a>
                                        <p style="color:#FF590F;"> Author(s): <?php echo $rowv98['pub_author']; ?></p>
                                    </li>

                                <?php } ?>

                            </ul>
                            </li><?php }


                            if ($row_v99 > 0) {
                            //if(file_exists($pathv55)){//vol2n5 imposed my DUMKA BIPNELO  continues 
                            ?>
                            <li class="item "><a href="#" class="list-group-item">VOL. 9 N0. 9<span
                                        class="icon"> </span></a>
                            <ul>
                                <?php
                                while ($rowv99 = $stmtv99->fetch(PDO::FETCH_ASSOC)) {
                                    ?>
                                    <li class="list-group-item"><a  class="items" style="color:#337ab7;"
                               href="abstract.php?j=<?php echo $rowv99['pub_journal'];?>&pn=<?php echo $rowv99['pub_name']; ?>&id=<?php echo $rowv99['id']; ?>" target="_blank"><span
                                                    class="glyphicon glyphicon-cloud-download"
                                                    aria-hidden="true"></span><?php echo $rowv99['pub_name']; ?></a>
                                        <p style="color:#FF590F;"> Author(s): <?php echo $rowv99['pub_author']; ?></p>
                                    </li>

                                <?php } ?>

                            </ul>
                            </li><?php }

                            if ($row_v100 > 0) {
                            //if(file_exists($pathv55)){//vol2n5 imposed my DUMKA BIPNELO  continues 
                            ?>
                            <li class="item "><a href="#" class="list-group-item">VOL. 9 N0. 10<span
                                        class="icon"> </span></a>
                            <ul>
                                <?php
                                while ($rowv100 = $stmtv100->fetch(PDO::FETCH_ASSOC)) {
                                    ?>
                                    <li class="list-group-item"><a  class="items" style="color:#337ab7;"
                               href="abstract.php?j=<?php echo $rowv100['pub_journal'];?>&pn=<?php echo $rowv100['pub_name']; ?>&id=<?php echo $rowv100['id']; ?>" target="_blank"><span
                                                    class="glyphicon glyphicon-cloud-download"
                                                    aria-hidden="true"></span><?php echo $rowv100['pub_name']; ?></a>
                                        <p style="color:#FF590F;"> Author(s): <?php echo $rowv100['pub_author']; ?></p>
                                    </li>

                                <?php } ?>

                            </ul>
                            </li><?php }


                             if ($row_v101 > 0) {
                            //if(file_exists($pathv55)){//vol2n5 imposed my DUMKA BIPNELO  continues 
                            ?>
                            <li class="item "><a href="#" class="list-group-item">VOL. 9 N0. 11<span
                                        class="icon"> </span></a>
                            <ul>
                                <?php
                                while ($rowv101 = $stmtv101->fetch(PDO::FETCH_ASSOC)) {
                                    ?>
                                    <li class="list-group-item"><a  class="items" style="color:#337ab7;"
                               href="abstract.php?j=<?php echo $rowv101['pub_journal'];?>&pn=<?php echo $rowv101['pub_name']; ?>&id=<?php echo $rowv101['id']; ?>" target="_blank"><span
                                                    class="glyphicon glyphicon-cloud-download"
                                                    aria-hidden="true"></span><?php echo $rowv101['pub_name']; ?></a>
                                        <p style="color:#FF590F;"> Author(s): <?php echo $rowv101['pub_author']; ?></p>
                                    </li>

                                <?php } ?>

                            </ul>
                            </li><?php }


                                   if ($row_v102 > 0) {
                            //if(file_exists($pathv55)){//vol2n5 imposed my DUMKA BIPNELO  continues 
                            ?>
                            <li class="item "><a href="#" class="list-group-item">VOL. 9 N0. 12<span
                                        class="icon"> </span></a>
                            <ul>
                                <?php
                                while ($rowv102 = $stmtv102->fetch(PDO::FETCH_ASSOC)) {
                                    ?>
                                    <li class="list-group-item"><a  class="items" style="color:#337ab7;"
                               href="abstract.php?j=<?php echo $rowv102['pub_journal'];?>&pn=<?php echo $rowv102['pub_name']; ?>&id=<?php echo $rowv102['id']; ?>" target="_blank"><span
                                                    class="glyphicon glyphicon-cloud-download"
                                                    aria-hidden="true"></span><?php echo $rowv102['pub_name']; ?></a>
                                        <p style="color:#FF590F;"> Author(s): <?php echo $rowv102['pub_author']; ?></p>
                                    </li>

                                <?php } ?>

                            </ul>
                            </li><?php }



  if ($row_v110 > 0) {
                            //if(file_exists($pathv55)){//vol2n5 imposed my DUMKA BIPNELO  continues 
                            ?>
                            <li class="item "><a href="#" class="list-group-item">VOL. 10 N0. 1<span
                                        class="icon"> </span></a>
                            <ul>
                                <?php
                                while ($rowv110 = $stmtv110->fetch(PDO::FETCH_ASSOC)) {
                                    ?>
                                    <li class="list-group-item"><a  class="items" style="color:#337ab7;"
                               href="abstract.php?j=<?php echo $rowv110['pub_journal'];?>&pn=<?php echo $rowv110['pub_name']; ?>&id=<?php echo $rowv110['id']; ?>" target="_blank"><span
                                                    class="glyphicon glyphicon-cloud-download"
                                                    aria-hidden="true"></span><?php echo $rowv110['pub_name']; ?></a>
                                        <p style="color:#FF590F;"> Author(s): <?php echo $rowv110['pub_author']; ?></p>
                                    </li>

                                <?php } ?>

                            </ul>
                            </li><?php }


                            if ($row_v112 > 0) {
                            //if(file_exists($pathv55)){//vol2n5 imposed my DUMKA BIPNELO  continues 
                            ?>
                            <li class="item "><a href="#" class="list-group-item">VOL. 10 N0. 2<span
                                        class="icon"> </span></a>
                            <ul>
                                <?php
                                while ($rowv112 = $stmtv112->fetch(PDO::FETCH_ASSOC)) {
                                    ?>
                                    <li class="list-group-item"><a  class="items" style="color:#337ab7;"
                               href="abstract.php?j=<?php echo $rowv112['pub_journal'];?>&pn=<?php echo $rowv112['pub_name']; ?>&id=<?php echo $rowv112['id']; ?>" target="_blank"><span
                                                    class="glyphicon glyphicon-cloud-download"
                                                    aria-hidden="true"></span><?php echo $rowv112['pub_name']; ?></a>
                                        <p style="color:#FF590F;"> Author(s): <?php echo $rowv112['pub_author']; ?></p>
                                    </li>

                                <?php } ?>

                            </ul>
                            </li><?php }

                             if ($row_v113 > 0) {
                            //if(file_exists($pathv55)){//vol2n5 imposed my DUMKA BIPNELO  continues 
                            ?>
                            <li class="item "><a href="#" class="list-group-item">VOL. 10 N0. 3<span
                                        class="icon"> </span></a>
                            <ul>
                                <?php
                                while ($rowv113 = $stmtv113->fetch(PDO::FETCH_ASSOC)) {
                                    ?>
                                    <li class="list-group-item"><a  class="items" style="color:#337ab7;"
                               href="abstract.php?j=<?php echo $rowv113['pub_journal'];?>&pn=<?php echo $rowv113['pub_name']; ?>&id=<?php echo $rowv113['id']; ?>" target="_blank"><span
                                                    class="glyphicon glyphicon-cloud-download"
                                                    aria-hidden="true"></span><?php echo $rowv113['pub_name']; ?></a>
                                        <p style="color:#FF590F;"> Author(s): <?php echo $rowv113['pub_author']; ?></p>
                                    </li>

                                <?php } ?>

                            </ul>
                            </li><?php }

                            if ($row_v114 > 0) {
                            //if(file_exists($pathv55)){//vol2n5 imposed my DUMKA BIPNELO  continues 
                            ?>
                            <li class="item "><a href="#" class="list-group-item">VOL. 10 N0. 4<span
                                        class="icon"> </span></a>
                            <ul>
                                <?php
                                while ($rowv114 = $stmtv114->fetch(PDO::FETCH_ASSOC)) {
                                    ?>
                                    <li class="list-group-item"><a  class="items" style="color:#337ab7;"
                               href="abstract.php?j=<?php echo $rowv114['pub_journal'];?>&pn=<?php echo $rowv114['pub_name']; ?>&id=<?php echo $rowv114['id']; ?>" target="_blank"><span
                                                    class="glyphicon glyphicon-cloud-download"
                                                    aria-hidden="true"></span><?php echo $rowv114['pub_name']; ?></a>
                                        <p style="color:#FF590F;"> Author(s): <?php echo $rowv114['pub_author']; ?></p>
                                    </li>

                                <?php } ?>

                            </ul>
                            </li><?php }

                            if ($row_v115 > 0) {
                            //if(file_exists($pathv55)){//vol2n5 imposed my EPHRAIM  continues 
                            ?>
                            <li class="item "><a href="#" class="list-group-item">VOL. 10 N0. 5<span
                                        class="icon"> </span></a>
                            <ul>
                                <?php
                                while ($rowv115 = $stmtv115->fetch(PDO::FETCH_ASSOC)) {
                                    ?>
                                    <li class="list-group-item"><a  class="items" style="color:#337ab7;"
                               href="abstract.php?j=<?php echo $rowv115['pub_journal'];?>&pn=<?php echo $rowv115['pub_name']; ?>&id=<?php echo $rowv115['id']; ?>" target="_blank"><span
                                                    class="glyphicon glyphicon-cloud-download"
                                                    aria-hidden="true"></span><?php echo $rowv115['pub_name']; ?></a>
                                        <p style="color:#FF590F;"> Author(s): <?php echo $rowv115['pub_author']; ?></p>
                                    </li>

                                <?php } ?>

                            </ul>
                            </li><?php }



                        ?>


                        <!--<li class="item2 wow fadeInDown animated" data-wow-delay=".5s"><a href="#">The standard Lorem Ipsum passage Etiam faucibus viverra libero vel efficitur. Ut semper nisl ut laoreet ultrices ?<span class="icon"> </span></a>
                            <ul>
                                <li class="subitem1"><p> Tincidunt ut laoreet dolore At vero eos et Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod  consectetuer adipiscing elit, sed diam nonummy nibh euismod accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident.</p></li>
                            </ul>
                        </li>-->
                    </ul>
                </div>


                <br>
                <div class="clearfix"></div>


            </div>

            <!--back issues-->

            <!--edit board-->
            <div id="editorial" style="display:none" class="col-md-9 product-model-sec">
                <div class="title-info wow fadeInUp animated" data-wow-delay=".5s" style="text-align:left;"></div>
                <h3 class="title" style="margin-top:-70px;"> <?php echo $row['journal_name_full']; ?>
                    <span>(<?php echo $row['journal_name']; ?>) <br>International Editorial Board Members</span></h3>
                <hr class="bs-docs-separator wow fadeInDown animated" data-wow-delay=".5s">

                <p><a id="home2" href="#"><span class="label label-primary">Journal Home</span></a>
                </p>

                <ul class="faq">

                    <?php while ($row_edit = $stmt_edit->fetch(PDO::FETCH_ASSOC)) {
                        ?>
                        <li class="item1 wow fadeInDown animated" data-wow-delay=".5s"><a href="#"
                                                                                          class="list-group-item"><strong><?php echo $row_edit['name']; ?></strong><br><?php if ($row_edit['dept'] != "") {
                                    echo $row_edit['dept'] . '<br>';
                                } ?><?php echo $row_edit['univ'] ?><br><?php echo $row_edit['address'] ?><br><span
                                        class="icon"> </span></a>

                        </li> <?php } ?>

                </ul>


                <div class="clearfix"></div>


            </div>

            <!--edit board-->

            <div class="col-md-3 rsidebar">
                <div class="rsidebar-top">
                    <div class="list-group list-group-alternate">
                        <a id="buttonc" class="list-group-item"><span class="badge"><?php //echo $count1; ?></span> <i
                                    class="ti ti-email"></i>Current Issue </a>
                        <a id="button" class="list-group-item"><span
                                    class="badge badge-primary"><?php //echo $count2; ?></span> <i
                                    class="ti ti-eye"></i>Back issues</a>
                        <a id="button2" class="list-group-item"><i class="ti ti-comments"></i>Editorial Board</a>
                        
                        <a href="submit/" class="list-group-item"><i class="ti ti-comments"></i>Submit Manuscript Online</a>
                        <a href="guide/" class="list-group-item"> <i class="ti ti-headphone-alt"></i>Manuscript
                            Guidelines</a>

                        <a href="pay" class="list-group-item"><i class="ti ti-email"></i>Make Payment</a>
                        <a href="pub" class="list-group-item">Publication Fees</a>
                        <a data-toggle="modal" href="#myModal" class="list-group-item"> <i
                                    class="ti ti-headphone-alt"></i>Call For Papers</a>


                        <br>
                        <h4> ALL JOURNALS</h4>
                        <ul class="faq">
                            <li class="item1"><a href="#">Sciences<span
                                            class="glyphicon glyphicon-menu-down"></span></a>
                                <ul>
                                    <li class="subitem1"><a href="journal/?j=IJHPR"><span class="badge badge-primary">&bull;</span>
                                            International Journal of Health And Pharmaceutical Research</a></li>
                                    <li class="subitem1"><a href="journal/?j=IJGEM"><span class="badge badge-primary">&bull;</span>
                                             IIARD International journal of geography and environmental management.</a>
                                    </li>
                                    <li class="subitem1"><a href="journal/?j=IJAES"><span class="badge badge-primary">&bull;</span>International
                                            Journal of Agriculture And Earth Science</a></li>
                                    <li class="subitem1"><a href="journal/?j=IJASMT"><span class="badge badge-primary">&bull;</span>International
                                            Journal of Applied Science And Mathematical Theory</a></li>
                                    <li class="subitem1"><a href="journal/?j=IJCCP"><span class="badge badge-primary">&bull;</span>International
                                            Journal of Chemistry And Chemical Processes</a></li>
                                    <li class="subitem1"><a href="journal/?j=IJCSMT"><span class="badge badge-primary">&bull;</span>International
                                            Journal of Computer Science And Mathematical Theory</a></li>
                                    <li class="subitem1"><a href="journal/?j=JBGR"><span class="badge badge-primary">&bull;</span>Journal
                                            of Biology And Genetic Research</a></li>
                                    <li class="subitem1"><a href="journal/?j=RJFSQC"><span class="badge badge-primary">&bull;</span>Research
                                            Journal of Food Science And Quality Control</a></li>
                                    <li class="subitem1"><a href="journal/?j=RJPST"><span class="badge badge-primary">&bull;</span>Research
                                            Journal of Pure Science And Technology</a></li>
                                    <li class="subitem1"><a href="journal/?j=WJIMT"><span class="badge badge-primary">&bull;</span>World
                                            Journal Of Innovation And Modern Technology</a></li>
                                </ul>
                            </li>
                            <li class="item2"><a href="#">Engineering<span class="glyphicon glyphicon-menu-down"></span></a>
                                <ul>
                                    <li class="subitem1"><a href="journal/?j=IJEMT"><span class="badge badge-primary">&bull;</span>International
                                            Journal of Engineering And Modern Technology</a></li>

                                </ul>
                            </li>
                            <li class="item3"><a href="#">Management Sciences <span
                                            class="glyphicon glyphicon-menu-down"></span></a>
                                <ul>
                                    <li class="subitem1"><a href="journal/?j=IJEBM"><span class="badge badge-primary">&bull;</span>
                                            IIARD International Journal of Economics And Business Management</a></li>
                                    <li class="subitem1"><a href="journal/?j=IJBFR"><span class="badge badge-primary">&bull;</span>IIARD International
                                            Journal of Banking and Finance Research</a></li>
                                    <li class="subitem1"><a href="journal/?j=IJEFM"><span class="badge badge-primary">&bull;</span>International
                                            Journal of Economics And Financial Management</a></li>
                                    <li class="subitem1"><a href="journal/?j=IJMCS"><span class="badge badge-primary">&bull;</span>International
                                            Journal of Marketing And Communication Studies</a></li>
                                    <li class="subitem1"><a href="journal/?j=IJSSMR"><span class="badge badge-primary">&bull;</span>International
                                            Journal of Social Sciences And Management Research</a></li>
                                    <li class="subitem1"><a href="journal/?j=JAFM"><span class="badge badge-primary">&bull;</span>Journal
                                            of Accounting And Financial Management</a></li>
                                    <li class="subitem1"><a href="journal/?j=JBAE"><span class="badge badge-primary">&bull;</span>Journal
                                            Of Business And African Economy</a></li>
                                    <li class="subitem1"><a href="journal/?j=WJEDS"><span class="badge badge-primary">&bull;</span>World
                                            Journal of Entrepreneurial Development Studies</a></li>
                                    <li class="subitem1"><a href="journal/?j=WJFIR"><span class="badge badge-primary">&bull;</span>World
                                            Journal Of Finance And Investment Research</a></li>
                                </ul>
                            </li>
                            <li class="item4"><a href="#">Humanities<span class="glyphicon glyphicon-menu-down"></span></a>
                                <ul>
                                    <li class="subitem1"><a href="journal/?j=AJHA"><span class="badge badge-primary">&bull;</span>African
                                            Journal of History And Archaeology</a></li>
                                    <li class="subitem1"><a href="journal/?j=IJELCS"><span class="badge badge-primary">&bull;</span>International
                                            Journal of English Language And Communication Studies</a></li>
                                    <li class="subitem1"><a href="journal/?j=IJRCP"><span class="badge badge-primary">&bull;</span>International
                                            Journal of Religious And Cultural Practice</a></li>
                                    <li class="subitem1"><a href="journal/?j=JHSP"><span class="badge badge-primary">&bull;</span>Journal
                                            of Humanities And Social Policy</a></li>
                                    <li class="subitem1"><a href="journal/?j=JLGP"><span class="badge badge-primary">&bull;</span>Journal
                                            Of Law And Global Policy</a></li>
                                    <li class="subitem1"><a href="journal/?j=JHMTR"><span class="badge badge-primary">&bull;</span>Journal
                                            Of Hotel Management And Tourism Research</a></li>
                                    <li class="subitem1"><a href="journal/?j=RJHCS"><span class="badge badge-primary">&bull;</span>Research
                                            Journal Of Humanities And Cultural Studies</a></li>
                                </ul>
                            </li>
                            <li class="item5"><a href="#">Social Sciences<span
                                            class="glyphicon glyphicon-menu-down"></span></a>
                                <ul>
                                    <li class="subitem1"><a href="journal/?j=RJMCIT"><span class="badge badge-primary">&bull;</span>Research
                                            Journal Of Mass Communication And Information Technology</a></li>
                                    <li class="subitem1"><a href="journal/?j=JPSLR"><span class="badge badge-primary">&bull;</span>Journal
                                            Of Political Science And Leadership Research</a></li>

                                    <li class="subitem1"><a href="journal/?j=JPASWR"><span class="badge badge-primary">&bull;</span>Journal
                                            of Public Administration And Social Welfare Research</a></li>
                                </ul>
                            </li>

                            <li class="item6"><a href="#">Education<span
                                            class="glyphicon glyphicon-menu-down"></span></a>
                                <ul>
                                    <li class="subitem1"><a href="journal/?j=IJEE"><span class="badge badge-primary">&bull;</span>International
                                            Journal Of Education And Evaluation</a></li>

                                </ul>
                            </li>
                        </ul>
                        <!-- script for tabs -->
                        <script type="text/javascript">
                            $(function () {

                                var menu_ul = $('.faq > li > ul'),
                                    menu_a = $('.faq > li > a');

                                menu_ul.hide();

                                menu_a.click(function (e) {
                                    e.preventDefault();
                                    if (!$(this).hasClass('active')) {
                                        menu_a.removeClass('active');
                                        menu_ul.filter(':visible').slideUp('normal');
                                        $(this).addClass('active').next().stop(true, true).slideDown('normal');
                                    } else {
                                        $(this).removeClass('active');
                                        $(this).next().stop(true, true).slideUp('normal');
                                    }
                                });

                            });
                        </script>
                        <!-- script for tabs -->
                    </div>


                    <!--modal-->
                    <div id="myModal" class="modal fade in">
                        <div class="modal-dialog">
                            <div class="modal-content">

                                <div class="modal-header">
                                    <a class="btn btn-default" data-dismiss="modal"><span
                                                class="glyphicon glyphicon-remove"></span></a>
                                    <h3 class="title"><?php echo $row['journal_name_full']; ?></h3>
                                </div>
                                <div class="modal-body">
                                    <h3 class="title"><span>Call For Papers</span></h3>
                                    <p style="text-align:justify">Research Articles written in English are invited from
                                        interested scholars and researchers in the academic community and other
                                        establishment for publication in the <?php echo $row['journal_name_full']; ?>.
                                        An author who wish to submit an article for publication, should note that the
                                        article has not been submitted elsewhere nor is it for consideration in another
                                        journal. The article should be the original work of the author. IIARD welcomes
                                        and acknowledges high quality theoretical and empirical original research
                                        papers, case studies, review papers, literature reviews, book reviews,
                                        conceptual framework, analytical and simulation models, technical note; from
                                        researchers, academicians, professionals, practitioners and students all over
                                        the world for publication.</p>
                                </div>
                                <div class="modal-footer">
                                    <div class="btn-group">
                                        <button class="btn btn-danger" data-dismiss="modal"><span
                                                    class="glyphicon glyphicon-remove"></span> Close
                                        </button>
                                        <a href="journals/CFP/<?php echo $row['journal_name']; ?>.pdf"
                                           class="btn btn-primary"><span
                                                    class="glyphicon glyphicon-download-alt"></span>Download Pdf</a>
                                    </div>
                                </div>

                            </div><!-- /.modal-content -->
                        </div><!-- /.modal-dalog -->
                    </div><!-- /.modal -->
                </div>


            </div><!--RSIDEBAR-->

            <div class="clearfix"></div>


            <div class="related-products">
                <div class="title-info wow fadeInUp animated" data-wow-delay=".5s">
                    <h3 class="title">Related<span> Journals</span></h3>
                    <p>Other Journals in the same Category</p>
                </div>
                <div class="related-products-info">

                    <?php $i = 1;//counter for new-mdl divs
                    while ($row3 = $stmt3->fetch(PDO::FETCH_ASSOC)) {

                        if ($i == 2) {
                            $idiv = "new-mdl";
                        } else if ($i == 3) {
                            $idiv = "new-mdl1";
                        } else {
                            $idiv = "";
                        } ?>
                        <div class="col-md-3 new-grid <?php echo $idiv; ?>  simpleCart_shelfItem wow flipInY animated"
                             data-wow-delay=".5s">
                            <div class="new-top">
                                <a href="journal/?j=<?php echo $row3['journal_name']; ?>"><img
                                            src="get/cover/<?php echo $row['journal_name']; ?>.jpg" class="img-responsive" alt=""/></a>
                                <div class="new-text">
                                    <ul>

                                        <li><a href="journal/?j=<?php echo $row3['journal_name']; ?>">View Details</a>
                                        </li>

                                    </ul>
                                </div>
                            </div>
                            <div class="new-bottom">
                                <h5><a class="name"
                                       href="journal/?j=<?php echo $row3['journal_name']; ?>"><?php echo $row3['journal_name']; ?></a>
                                </h5>

                                <div class="ofr">

                                    <p><span class="item_price"><?php echo $issn ?></span></p>
                                </div>
                            </div>
                        </div>
                        <?php $i = $i + 1;
                    } ?>


                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>
    <!--//single-page-->
    <!--footer-->

    <?php include "inc/footer.php"; ?>

    <!--//footer-->

    <!--search jQuery-->

    <script>

        

        $("#button").click(function () {
            $('#journal, #button').fadeOut('fast', function () {
                $('#back, #button').fadeIn('fast');
            });
            $('#editorial, #button').fadeOut('fast', function () {
                $('#back, #button').fadeIn('fast');
            });
            $('#current, #button').fadeOut('fast', function () {
                $('#back, #button').fadeIn('fast');
            });
        });

        $("#button2").click(function () {
            $('#journal, #button2').fadeOut('fast', function () {
                $('#editorial, #button2').fadeIn('fast');
            });
            $('#back, #button2').fadeOut('fast', function () {
                $('#editorial, #button2').fadeIn('fast');
            });
            $('#current, #button2').fadeOut('fast', function () {
                $('#editorial, #button2').fadeIn('fast');
            });
        });

        $("#buttonc").click(function () {
            $('#journal, #buttonc').fadeOut('fast', function () {
                $('#current, #buttonc').fadeIn('fast');
            });
            $('#back, #buttonc').fadeOut('fast', function () {
                $('#current, #buttonc').fadeIn('fast');
            });
            $('#editorial, #buttonc').fadeOut('fast', function () {
                $('#current, #buttonc').fadeIn('fast');
            });
         });

        $("#home").click(function () {
            $('#back, #home').fadeOut('slow', function () {
                $('#journal, #home').fadeIn('fast');
            });
        });

        $("#home2").click(function () {
            $('#editorial, #home2').fadeOut('slow', function () {
                $('#journal, #home2').fadeIn('fast');
            });
        });

        $("#homec").click(function () {
            $('#current, #homec').fadeOut('fast', function () {
                $('#journal, #homec').fadeIn('fast');
            });
        });

    </script>

    <script src="js/main.js"></script>
    <!--//search jQuery-->
    <!--smooth-scrolling-of-move-up-->
    <script type="text/javascript">
        $(document).ready(function () {

            var defaults = {
                containerID: 'toTop', // fading element id
                containerHoverID: 'toTopHover', // fading element hover id
                scrollSpeed: 1200,
                easingType: 'linear'
            };

            $().UItoTop({easingType: 'easeOutQuart'});

        });
        //note
       
    </script>
    <!--//smooth-scrolling-of-move-up-->
    <!--Bootstrap core JavaScript
    ================================================== -->
    <!--Placed at the end of the document so the pages load faster -->
    <script src="js/bootstrap.js"></script>

 


    </body>
    </html>







<?php } else {
    header('Location: ../journals/');
}