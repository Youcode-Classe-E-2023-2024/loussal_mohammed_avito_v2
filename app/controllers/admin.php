<?php


Class Admin extends Controller{
    public function __construct(){
        if(!adminIsLoggedIn()):
            redirect('users/login');
           
        endif;
        $this->publicationModel = $this->model('Publication');
        
        $this->userModel = $this->model('User');
     }

     public function index(){
        $publications = $this->publicationModel->getPublications();
        $data = [ 
            'publications' => $publications,
            
          ];
        $this->view('admin/index', $data);
     }

     public function users(){
        $users = $this->userModel->get_Users();
        $data = [
            'users' => $users,
        ];
        
        $this->view('admin/users' , $data);
     }

     public function delete($publicationId){
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            
            $result = $this->publicationModel->adminDeletePublication($publicationId );
            if($result){
              echo json_encode(['status' => 'deleted', 'message' => ' deleted successfully!']);
            }else{
              echo json_encode(['status' => 'failed', 'message' => 'can\'t delete !']);
            }
        }else{
          echo json_encode(['status' => 'error', 'message' => 'Like removed !']);
        }
     }
}