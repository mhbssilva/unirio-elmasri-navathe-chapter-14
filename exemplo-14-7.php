<?php

/*************************************************************
 * O código deste arquivo é uma adaptação do seguinte código:
 *************************************************************
 *
 * 0) require 'DB.php';
 * 1) $d = DB::connect('oci8://acct1:pass12@www.host.com/dbname');
 * 2) if (DB::isError($d)) { die("cannot connect – " . $d->getMessage()); }
 * 3) $d->setErrorHandling(PEAR_ERROR_DIE);
 * ...
 * 4) $q = $d->query('SELECT Name, Dno FROM EMPLOYEE');
 * 5) while ($r = $q->fetchRow()) {
 * 6) print "employee $r[0] works for department $r[1] \n" ;
 * 7) }
 * ...
 * 8) $q = $d->query('SELECT Name FROM EMPLOYEE WHERE Job = ? AND Dno = ?',
 * 9) array($_POST['emp_job'], $_POST['emp_dno']) );
 * 10) print "employees in dept $_POST['emp_dno'] whose job is
 * $_POST['emp_job']: \n"
 * 11) while ($r = $q->fetchRow()) {
 * 12) print "employee $r[0] \n" ;
 * 13) }
 * ...
 * 14) $allresult = $d->getAll('SELECT Name, Job, Dno FROM EMPLOYEE');
 * 15) foreach ($allresult as $r) {
 * 16) print "employee $r[0] has job $r[1] and works for department $r[2] \n" ;
 * 17) }
 * ...
 *
 *************************************************************/

try {

    // 1. Cria a conexão com o banco de dados utilizando a classe PDO.
    $d = new PDO("mysql:host=localhost;dbname=pcssgbd", "root", "");
    $d->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

} catch (PDOException $e) {

    // 2. Em caso de erro de conexão, informa que não é possível conectar
    die('Erro ao criar a conexão. Info: ' . $e->getMessage());

}

// ...

// 3. Lista todos os employees por nome e departamento.
$statement  = $d->prepare("SELECT Name, Dno FROM EMPLOYEE");
$statement->execute();

while($r = $statement->fetch(PDO::FETCH_ASSOC)) {
    print "employee $r[Name] works for department $r[Dno] \n" ;
}

// ...

$emp_job = isset($_REQUEST['emp_job']) ? ($_REQUEST['emp_job']) : null;
$emp_dno = isset($_REQUEST['emp_dno']) ? ($_REQUEST['emp_dno']) : null;

// 4. Lista os employees por cargo e departamento
// de acordo com os parâmetros de entrada.
$statement  = $d->prepare("SELECT Name FROM EMPLOYEE WHERE Job = :emp_job AND Dno = :emp_dno");
$statement->bindParam(":emp_job", $emp_job, PDO::PARAM_STR);
$statement->bindParam(":emp_dno", $emp_dno, PDO::PARAM_INT);
$statement->execute();

print "employees in dept {$emp_dno} whose job is {$emp_job}: \n";

while($r = $statement->fetch(PDO::FETCH_ASSOC)) {
    print "employee $r[Name] \n" ;
}

// ...

// 5. Obtém todos os employees da base, aplica
// um fetchAll e itera no foreach.
$statement  = $d->prepare("SELECT Name, Job, Dno FROM EMPLOYEE");
$statement->execute();

foreach($statement->fetchAll() as $r) {
    print "employee {$r['Name']} has job {$r['Job']} and works for department {$r['Dno']} \n" ;
}

?>