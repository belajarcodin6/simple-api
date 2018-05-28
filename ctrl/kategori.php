<?php
// Kategori Route

$app->get('/kategori/{id}', function($request, $response, $args){
    $where = "";
    $id = $request->getAttribute('id');
    $db = $this->db;
    if(!empty($id)){
        if($id!="semua" || $id){
            $where = "WHERE t.id='$id'";
        }
    }

    $sql = "SELECT t.* FROM kategori t $where ORDER BY t.id";
    $qry = $db->query($sql);
    $res = $qry->fetchAll();

    if(empty($res)){
        // jika query kosong
        $data = [];
        $status = $response->getStatusCode();
        $newResponse = $response->withJson($data);
        return $newResponse;
    }else{
        return $response
            ->withStatus(200)
            ->withHeader('Content-Type','application/json')
            ->write(json_encode($res));
    }
});

$app->post('/kategori/add', function($request, $response, $args) {
    $db = $this->db;
    $data = $request->getParsedBody()[0];
    $nama = $data['nama'];
    $ket  = $data['keterangan'];
    $status = 204;
    $sql = "INSERT INTO kategori (`nama`, `keterangan` ) VALUES ('$nama','$ket')";
    if(!empty($nama) && !empty($ket)) {        
        if($qry = $db->query($sql)){
            $result = array('pesan'=>'Sukses', 'SQL'=> $sql);
            $status = 200;
        }
        else {
            $result = array('pesan'=>'Query Gagal', 'SQL'=> $sql);
            $status = 204;
        }
    }
    else {
        $result = array('pesan'=>'Data tidak Lengkap', 'SQL'=> $sql);
        $status = 200;
    }

    return $response
        ->withStatus($status)
        ->withHeader('Content-Type', 'application/json')
        ->write(json_encode($result));
});

$app->post('/kategori/update', function($request, $response, $args) {
    $db = $this->db;
    $data = $request->getParsedBody()[0];
    $id   = $data['id'];
    $nama = $data['nama'];
    $ket  = $data['keterangan'];
    $status = 204;

    $sql = "UPDATE kategori SET `nama` = '$nama', `keterangan` = '$ket' WHERE id='$id'";
    
    
        if($qry = $db->query($sql)){
            $result = array('pesan'=>'Sukses', 'SQL'=> $sql);
            $status = 200;
        }
        else {
            $result = array('pesan'=>'Query Gagal', 'SQL'=> $sql);
            $status = 204;
        }    

    return $response
        ->withStatus($status)
        ->withHeader('Content-Type', 'application/json')
        ->write(json_encode($result));
});

$app->post('/kategori/delete/{id}', function($request, $response, $args){    
    $db     = $this->db;
    $id     =  $request->getAttribute('id');
    $sql    = "DELETE FROM kategori WHERE id='$id'";
    $status = 204;
    if(!empty($id)){        
        $qry = $db->query($sql);
        $count = $qry->rowCount();
        if($count>0){
            $result= array('pesan' => 'Sukses', 'SQL' => $count);
            $status = 200;
        }else{
            $result= array('pesan' => 'Tidak ada data yg di hapus', 'SQL' => $sql);
        }
    }    
    else{
        $result = array('pesan' => 'Error: Data tidak bisa hapus!', 'SQL' => $sql); 
    }
    return $response
            ->withStatus(200)
            ->withHeader('Content-type', 'application/json')
            ->write(json_encode($result));
        
});