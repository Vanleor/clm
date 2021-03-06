<?php
class Projects_gallery extends Admin_core_controller { # see application/core/MY_Controller.php

  public function index()
  {
    if (!$this->input->get('p')) {
      redirect('admin/projects');
    }
    $res = $this->projects_gallery_model->getGallery($this->input->get('p'));
    $data['gallery'] = $res;
    $data['project'] = $this->projects_model->get($this->input->get('p'));
    $this->wrapper('admin/projects_gallery', $data);
  }

  public function add()
  {
    $data = array_merge($this->input->post(), $this->projects_gallery_model->upload('image_url'));

    if($this->projects_gallery_model->add($data)){
      $this->session->set_flashdata('flash_msg', ['message' => 'Item added successfully', 'color' => 'green']);
    } else {
      $this->session->set_flashdata('flash_msg', ['message' => 'Error adding item', 'color' => 'red']);
    }

    $this->admin_redirect('admin/projects_gallery' . '?p=' . $this->input->post('project_id'));
  }

  public function delete()
  {
    if($this->projects_gallery_model->delete($this->input->post('id'))){
      $this->session->set_flashdata('flash_msg', ['message' => 'Item deleted successfully', 'color' => 'green']);
    } else {
      $this->session->set_flashdata('flash_msg', ['message' => 'Error deleting item', 'color' => 'red']);
    }

    $this->admin_redirect('admin/projects_gallery' . '?p=' . $this->input->post('project_id'));
  }

}
