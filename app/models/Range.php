<?php
  class Range {
    private $db;

    public function __construct(){
      $this->db = new Database;
    }

    public function getRanges(){
      $this->db->query('SELECT *,
                        ranges.id as rangeId,
                        users.id as userId,
                        ranges.created_at as rangeCreated,
                        users.created_at as userCreated
                        FROM ranges
                        INNER JOIN users
                        ON ranges.user_id = users.id
                        ORDER BY ranges.created_at DESC
                        ');

      $results = $this->db->resultSet();

      return $results;
    }

    public function addRange($data){
      $this->db->query('INSERT INTO ranges (title, user_id, body, img) VALUES(:title, :user_id, :body, :img)');
      // Bind values
      $this->db->bind(':title', $data['title']);
      $this->db->bind(':user_id', $data['user_id']);
      $this->db->bind(':body', $data['body']);
      $this->db->bind(':img', $data['img']);

      // Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }

    public function updateRange($data){
      $this->db->query('UPDATE ranges SET title = :title, body = :body, img = :img WHERE id = :id');
      // Bind values
      $this->db->bind(':id', $data['id']);
      $this->db->bind(':title', $data['title']);
      $this->db->bind(':body', $data['body']);
      $this->db->bind(':img', $data['img']);

      // Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }

    public function getRangeById($id){
      $this->db->query('SELECT * FROM ranges WHERE id = :id');
      $this->db->bind(':id', $id);

      $row = $this->db->single();

      return $row;
    }

    public function deleteRange($id){
      $this->db->query('DELETE FROM ranges WHERE id = :id');
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