<?php
/**
 * Created by PhpStorm.
 * User: alexx
 * Date: 21.08.19
 * Time: 13:22
 */

class ContactsController extends Controller
{
    public function __construct($controller, $action)
    {
        parent::__construct($controller, $action);
        $this->view->setLayout('default');
        $this->load_model('Contacts');
    }

    public function indexAction(){
        $contacts= $this->ContactsModel->findByUserId(currentUser()->id,['order'=>'lname, fname']);

        $this->view->contacts = $contacts;

        $this->view->render('contacts/index');
    }

    public function addAction(){
        $contact = new Contacts('contacts');
        $validation = new Validate();
        if ($_POST){
            $contact->assign($_POST);
            $validation->check($_POST, Contacts::$addValidation);
            if ($validation->passed()){
                $contact->user_id = currentUser()->id;
                $contact->deleted =0;
                $contact->save();
                Router::redirect('/contacts');
            }

        }
        $this->view->contact = $contact;
        $this->view->displayErrors = $validation->displayErrors();
        $this->view->postAction = DS.PROOT.'contacts'.DS.'add';
        $this->view->render('contacts/add');
    }

    public function editAction($id){
        $contact = $this->ContactsModel->findByIdAndUserId((int)$id,currentUser()->id);
        if (!$contact){
            Router::redirect('/contacts');
        }
        $validation = new Validate();
        if ($_POST){
            $contact->assign($_POST);
            $validation->check($_POST, Contacts::$addValidation);
            if ($validation->passed()){
                $contact->save();
                Router::redirect('/contacts');
            }
        }
        $this->view->displayErrors = $validation->displayErrors();
        $this->view->contact = $contact;
        $this->view->postAction = '/contacts'.DS. 'edit'.DS.$contact->id;
        $this->view->render('/contacts/edit');
    }

    public function detailsAction($id){
        $contact = $this->ContactsModel->findByIdAndUserId((int)$id,currentUser()->id);

        if (!$contact){
            Router::redirect('/contacts');
        }

        $this->view->contact = $contact;
        $this->view->render('contacts/datails');
    }

    public function deleteAction($id){

        $contact = $this->ContactsModel->findByIdAndUserId((int)$id,currentUser()->id);


        if ($contact) {
           $contact->delete($id);
        }
        Router::redirect('/contacts');
    }
}