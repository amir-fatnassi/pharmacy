<?php
  class Pharmaceutical {
    private $db;

    public function __construct(){
      $this->db = new Database;
    }

    public function getPharmaceuticals(){
      $this->db->query('SELECT *,
                        pharmaceuticals.id as pharmaceuticalId,
                        users.id as userId,
                        pharmaceuticals.created_at as pharmaceuticalCreated,
                        users.created_at as userCreated
                        FROM pharmaceuticals
                        INNER JOIN users
                        ON pharmaceuticals.user_id = users.id
                        ORDER BY pharmaceuticals.created_at DESC
                        ');

      $results = $this->db->resultSet();

      return $results;
    }

    public function addPharmaceutical($data){
      $this->db->query('INSERT INTO pharmaceuticals (title, user_id, range_id, body, img) VALUES(:title, :user_id, :range_id, :body, :img)');
      // Bind values
      $this->db->bind(':title', $data['title']);
      $this->db->bind(':user_id', $data['user_id']);
      $this->db->bind(':range_id', $data['range_id']);
      $this->db->bind(':body', $data['body']);
      $this->db->bind(':img', $data['img']);

      // Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }

    public function updatePharmaceutical($data){
      $this->db->query('UPDATE pharmaceuticals SET title = :title, body = :body WHERE id = :id');
      // Bind values
      $this->db->bind(':id', $data['id']);
      $this->db->bind(':title', $data['title']);
      $this->db->bind(':body', $data['body']);

      // Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }

    public function getPharmaceuticalById($id){
      $this->db->query('SELECT * FROM pharmaceuticals WHERE id = :id');
      $this->db->bind(':id', $id);

      $row = $this->db->single();

      return $row;
    }

    public function getPharmaceuticalsByRangeId($range_id){
      $this->db->query('SELECT * FROM pharmaceuticals WHERE range_id = :range_id');
      $this->db->bind(':range_id', $range_id);

      $results = $this->db->resultSet();

      return $results;
    }

    public function getPharmaceuticalsPopular($limit_num){
      $this->db->query('SELECT * FROM pharmaceuticals WHERE popular = 1 ORDER BY created_at ASC LIMIT :limit_num');
      $this->db->bind(':limit_num', $limit_num);

      $results = $this->db->resultSet();

      return $results;
    }

    public function getPharmaceuticalsNew($limit_num){
      $this->db->query('SELECT * FROM pharmaceuticals ORDER BY created_at ASC LIMIT :limit_num');
      $this->db->bind(':limit_num', $limit_num);

      $results = $this->db->resultSet();

      return $results;
    }

    public function deletePharmaceutical($id){
      $this->db->query('DELETE FROM pharmaceuticals WHERE id = :id');
      // Bind values
      $this->db->bind(':id', $id);

      // Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }
  }