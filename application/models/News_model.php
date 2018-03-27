<?php
class News_model extends Admin_core_model # application/core/MY_Model
{
  function __construct()
  {
    parent::__construct();
    $this->table = 'news';
    $this->upload_dir = 'uploads/news';
  }

  public function all() # overriden method
  {
    $res = $this->db->get($this->table)->result();
    foreach ($res as $key => $value) {
      $res[$key]->image_url = base_url("{$this->upload_dir}/") . $value->image_url;
    }
    return $res;
  }

}