<?php

/*************************************************************
 * O código deste arquivo é uma adaptação do seguinte código:
 *************************************************************
 *
 * 0) require 'DB.php';
 * 1) $d = DB::connect('oci8://acct1:pass12@www.host.com/db1');
 * 2) if (DB::isError($d)) { die("cannot connect – " . $d->getMessage());}
 *    ...
 * 3) $q = $d->query("CREATE TABLE EMPLOYEE
 * 4) (Emp_id INT,
 * 5) Name VARCHAR(15),
 * 6) Job VARCHAR(10),
 * 7) Dno INT)" );
 * 8) if (DB::isError($q)) { die("table creation not successful – " .
 *    $q->getMessage()); }
 *    ...
 * 9) $d->setErrorHandling(PEAR_ERROR_DIE);
 *    ...
 * 10) $eid = $d->nextID('EMPLOYEE');
 * 11) $q = $d->query("INSERT INTO EMPLOYEE VALUES
 * 12) ($eid, $_POST['emp_name'], $_POST['emp_job'], $_POST['emp_dno'])" );
 *     ...
 * 13) $eid = $d->nextID('EMPLOYEE');
 * 14) $q = $d->query('INSERT INTO EMPLOYEE VALUES (?, ?, ?, ?)',
 * 15) array($eid, $_POST['emp_name'], $_POST['emp_job'], $_POST['emp_dno']) );
 *
 *************************************************************/

// Exemplos de links para cadastrar:
// http://localhost/pcs-sgbd/exemplo-14-6?emp_name=Joao&emp_job=ceo&emp_dno=1
// http://localhost/pcs-sgbd/exemplo-14-6?emp_name=Maria&emp_job=ceo&emp_dno=2
// http://localhost/pcs-sgbd/exemplo-14-6?emp_name=Jose&emp_job=ceo&emp_dno=2
// http://localhost/pcs-sgbd/exemplo-14-6?emp_name=Osvaldo&emp_job=ceo&emp_dno=2
// http://localhost/pcs-sgbd/exemplo-14-6?emp_name=Fernando&emp_job=ceo&emp_dno=3
// http://localhost/pcs-sgbd/exemplo-14-6?emp_name=Marcia&emp_job=ceo&emp_dno=3

try {

    // 1. Cria a conexão com o banco de dados utilizando a classe PDO.
    $d = new PDO("mysql:host=localhost;dbname=pcssgbd", "root", "");
    $d->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

} catch (PDOException $e) {

    // 2. Em caso de erro de conexão, informa que não é possível conectar
    die('Erro ao criar a conexão. Info: ' . $e->getMessage());

}

// ...

try{

    // 3. Cria a tabela EMPLOYEE
//    $q = $d->exec("CREATE TABLE EMPLOYEE(Emp_id INT, Name VARCHAR(15), Job VARCHAR(10), Dno INT)" );

} catch (PDOException $e) {

    // 4. Em caso de erro ao criar a tabela, informa que não é possível criar
    die('Erro ao criar a tabela. Info: ' . $e->getMessage());

}

// ...

try{

    // 5. Obtém as informações do registro a ser adicionado.
    $emp_name   = isset($_REQUEST['emp_name'])  ? ($_REQUEST['emp_name'])   : null;
    $emp_job    = isset($_REQUEST['emp_job'])   ? ($_REQUEST['emp_job'])    : null;
    $emp_dno    = isset($_REQUEST['emp_dno'])   ? ($_REQUEST['emp_dno'])    : null;

    // 6.1. Obtém o ID do próximo registro a ser inserido.
    $statement  = $d->prepare("SELECT (max(Emp_id)+1) max_id FROM EMPLOYEE");
    $statement->execute();
    $fetch_query= $statement->fetch(PDO::FETCH_ASSOC);
    $eid        = isset($fetch_query['max_id']) ? ($fetch_query['max_id']) : 0;

    // 6.2. Adiciona um registro na tabela Employee.
    $statement = $d->prepare("INSERT INTO EMPLOYEE VALUES (:eid, :emp_name, :emp_job, :emp_dno)");
    $statement->bindParam(":eid", $eid, PDO::PARAM_INT);
    $statement->bindParam(":emp_name", $emp_name, PDO::PARAM_STR);
    $statement->bindParam(":emp_job", $emp_job, PDO::PARAM_STR);
    $statement->bindParam(":emp_dno", $emp_dno, PDO::PARAM_INT);
    $statement->execute();

    // ...

    // 6.3. Obtém o ID do próximo registro a ser inserido.
    $statement  = $d->prepare("SELECT (max(Emp_id)+1) max_id FROM EMPLOYEE");
    $statement->execute();
    $fetch_query= $statement->fetch(PDO::FETCH_ASSOC);
    $eid        = isset($fetch_query['max_id']) ? ($fetch_query['max_id']) : 0;

    // 6.4. Adiciona um registro na tabela Employee.
    $statement = $d->prepare("INSERT INTO EMPLOYEE VALUES (:eid, :emp_name, :emp_job, :emp_dno)");
    $statement->bindParam(":eid", $eid, PDO::PARAM_INT);
    $statement->bindParam(":emp_name", $emp_name, PDO::PARAM_STR);
    $statement->bindParam(":emp_job", $emp_job, PDO::PARAM_STR);
    $statement->bindParam(":emp_dno", $emp_dno, PDO::PARAM_INT);
    $statement->execute();

} catch (PDOException $e) {

    // 7. Em caso de erro ao inserir um dos registros, informa que não é possível criar
    die('Erro ao inserir o registro na tabela. Info: ' . $e->getMessage());

}

?>