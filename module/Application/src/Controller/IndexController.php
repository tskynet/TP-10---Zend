<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

use Zend\Db\Adapter\Adapter;
use Zend\Db\Sql\Sql;

class IndexController extends AbstractActionController
{
    public function lay(){
      $adapter = new Adapter(array(
        'driver' => 'Mysqli',
        'database' => 'zend',
        'username' => 'root',
        'password' => ''
      ));
      $this->layout('layout/layout.phtml');
      $results_menu= $adapter->query('SELECT * FROM `menu`',$adapter::QUERY_MODE_EXECUTE);
      $data_menu=[];
      foreach($results_menu as $row_menu){
        $data_menu[]=array(
          'href'=>$row_menu['href'],
          'title'=>$row_menu['title']
        );
      }
      $this->layout()->setVariable('menu',$data_menu);
      //$this->layout('layout/generic'); --> permet de changer le layout, le generic est l'endroit où on indique le nom du fichier dans le répertoire layout !
    //  $this->layout()->setVariable('maVariable','valeur');
    }
    public function indexAction()
    {
        $adapter = new Adapter(array(
          'driver' => 'Mysqli',
          'database' => 'zend',
          'username' => 'root',
          'password' => ''
        ));
        $this->lay();
        //$sql = new Sql($adapter);
        //$select = $sql->select()->from('contact')->order('id ASC')->limit(20);
        //$selectString = $sql->getSqlStringForSqlObject($select);

        //$results = $adapter->query('SELECT * FROM `contact` LIMIT 20',$adapter::QUERY_MODE_EXECUTE);
        // $results = $adapter->query(
        //   $selectString,
        //   $adapter::QUERY_MODE_EXECUTE
        // );
        /*LAYOUT*/



       $results_team = $adapter->query('SELECT * FROM `team` LIMIT 4',$adapter::QUERY_MODE_EXECUTE);
       $data_team=[];
       foreach($results_team as $row_team){
         $data_team[]=array(
           'img'=>$row_team['img'],
           'alt'=>$row_team['alt'],
           'name'=>$row_team['name'],
           'grade'=>$row_team['grade'],
           'link'=>$row_team['link']
         );
       }
       $results_purpose = $adapter->query('SELECT * FROM `purpose` LIMIT 3',$adapter::QUERY_MODE_EXECUTE);
       $data_purpose=[];
       foreach($results_purpose as $row_purpose){
         $data_purpose[]=array(
           'img'=>$row_purpose['img'],
           'alt'=>$row_purpose['alt'],
           'title'=>$row_purpose['title'],
           'text'=>$row_purpose['text']
         );
       }
       $results_slider1 = $adapter->query('SELECT * FROM `slider1`',$adapter::QUERY_MODE_EXECUTE);
       $data_slider1=[];
       foreach($results_slider1 as $row_slider1){
         $data_slider1[]=array(
           'img'=>$row_slider1['img'],
           'alt'=>$row_slider1['alt']
         );
       }
       $results_slider2 = $adapter->query('SELECT * FROM `slider2`',$adapter::QUERY_MODE_EXECUTE);
       $data_slider2=[];
       foreach($results_slider2 as $row_slider2){
         $data_slider2[]=array(
           'img'=>$row_slider2['img'],
           'alt'=>$row_slider2['alt'],
           'text'=>$row_slider2['text']
         );
       }
       $results_slider3=$adapter->query('SELECT * FROM `slider3`',$adapter::QUERY_MODE_EXECUTE);
       $data_slider3=[];
       foreach($results_slider3 as $row_slider3){
         $data_slider3[]=array(
           'img'=>$row_slider3['img'],
           'alt'=>$row_slider3['alt']
         );
       }

        $viewModel = new ViewModel();
        $viewModel->setVariables(array(
          'someVariableName' =>'bla',
          'someVariableName2' =>'bla2',
          'grade'=>$data_team,
          'purpose'=>$data_purpose,
          'slider1'=>$data_slider1,
          'slider2'=>$data_slider2,
          'slider3'=>$data_slider3,
        ));
        return $viewModel;
    } // fin fonction indexAction

    public function aboutmeAction()
    {
      $adapter = new Adapter(array(
        'driver' => 'Mysqli',
        'database' => 'zend',
        'username' => 'root',
        'password' => ''
      ));
      $this->lay();
      return new ViewModel();

    }

    public function contactAction(){
      $this->lay();
      return new ViewModel();
    }

    public function teamAction(){
      $adapter = new Adapter(array(
        'driver' => 'Mysqli',
        'database' => 'zend',
        'username' => 'root',
        'password' => ''
      ));
      $this->lay();
      $results_teampage=$adapter->query('SELECT * FROM `teampage`',$adapter::QUERY_MODE_EXECUTE);
      $data_teampage=[];
      foreach($results_teampage as $row_teampage){
        $data_teampage[]=array(
          'img'=>$row_teampage['img'],
          'alt'=>utf8_encode($row_teampage['alt']),
          'age'=>utf8_encode($row_teampage['age']),
          'city'=>utf8_encode($row_teampage['city']),
          'description'=>utf8_encode($row_teampage['description']),
          'poste'=>utf8_encode($row_teampage['poste']),
          'id' =>$row_teampage['id'],

        );

      }
      // echo $this->params()->fromRoute('id');

      $viewModel = new ViewModel();
      $viewModel->setVariables(array(
        'teampage'=>$data_teampage,
        'idpage' => $this->params()->fromRoute('id')
      ));
      return $viewModel;
    }
    public function albumAction(){
      return new ViewModel();
    }
}
