<?php

declare(strict_types=1);

namespace App\Controller;

use Cake\Http\FlashMessage;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */

    public function initialize(): void
    {
        $this->loadComponent('Flash');
        $this->loadComponent('Authentication.Authentication');
        $this->Model = $this->loadModel('Cars');
        $this->Model = $this->loadModel('Ratings');
        $this->Model = $this->loadModel('Brands');
        if ($this->Authentication->getIdentity()) {
            $auth = true;
        } else {
            $auth = false;
        }
        $this->set(compact('auth'));
    }

    public function index()
    {
        $user = $this->Authentication->getIdentity();
        if ($user->role == 0) {
            $this->paginate = [
                'contain' => ['Ratings'],
                'order' => ['id' => 'desc'],
            ];
            $cars = $this->paginate($this->Cars);


            $this->set(compact('cars'));
        } else {
            return $this->redirect(['action' => 'home']);
        }
    }

    public function userindex()
    {
        $user = $this->Authentication->getIdentity();
        if ($user->role == 0) {
            $users = $this->paginate($this->Users->find('all')->where(['role' => 1])->order(['id' => 'desc']));

            $this->set(compact('users'));
        } else {
            return $this->redirect(['action' => 'home']);
        }
    }

    public function home()
    {
        if ($this->Authentication->getIdentity()) {
            $user = $this->Authentication->getIdentity();
            if ($user->role == 0) {
                return $this->redirect(['action' => 'index']);
            } else {
                $key = $this->request->getQuery('key');
                if ($key) {
                    $query = $this->Cars->find('all')
                        ->where(['Or' => ['company like' => '%' . $key . '%', 'brand like' => '%' . $key . '%', 'model like' => '%' . $key . '%', 'make like' => '%' . $key . '%', 'color like' => '%' . $key . '%']]);
                } else {
                    $query = $this->Cars;
                }
                $cars = $this->paginate($query);
            }
        } else {
            $key = $this->request->getQuery('key');
            if ($key) {
                $query = $this->Cars->find('all')
                    ->where(['Or' => ['company like' => '%' . $key . '%', 'brand like' => '%' . $key . '%', 'model like' => '%' . $key . '%', 'make like' => '%' . $key . '%', 'color like' => '%' . $key . '%']]);
            } else {
                $query = $this->Cars;
            }
            $cars = $this->paginate($query);
        }
        $this->set(compact('cars'));
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        if ($this->Authentication->getIdentity()) {
            $user = $this->Authentication->getIdentity();
            $role = $user->role;
            $user_id = $user->id;
            $name = $user->name;
        } else {
            $role = 1;
        }
        $car = $this->Cars->get($id, [
            'contain' => ['Ratings'],
        ]);

        $overallstar = 0;
        $count = 0;
        $ratings = $this->Ratings->find('all')->where(['car_id' => $id])->order(['id' => 'DESC'])->all();
        if (!empty($car->ratings)) {
            $array = json_decode(json_encode($ratings), true);

            $sum = 0;
            foreach ($array as $arr) {
                $sum += $arr['star'];
                $count++;
            }
            $overallstar = $sum / $count;
        }
        $rating = $this->Ratings->newEmptyEntity();
        if ($this->request->is('post')) {

            $result = $this->Ratings->find('all')->where(['car_id' => $id, 'user_id' => $user_id])->first();
            if ($result) {
                $stars = $this->request->getData('star');
                $review = $this->request->getData('review');
                $result->star = $stars;
                $result->review = $review;
                if ($this->Ratings->save($result)) {
                    return $this->redirect(['action' => 'view', $id]);
                }
            } else {
                $rating = $this->Ratings->patchEntity($rating, $this->request->getData());
                $rating['user_id'] = $user_id;
                $rating['car_id'] = $id;
                $rating['user_name'] = $name;
                if ($this->Ratings->save($rating)) {

                    return $this->redirect(['action' => 'view', $id]);
                }
            }
        }
        // $this->set(compact('rating'));

        $this->set(compact('car', 'role', 'rating', 'ratings', 'overallstar', 'count'));
    }

    public function userview($id = null)
    {
        $user = $this->Authentication->getIdentity();
        if ($user->role == 0) {
            $user = $this->Users->get($id, [
                'contain' => [],
            ]);

            $this->set(compact('user'));
        } else {
            return $this->redirect(['action' => 'home']);
        }
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function register()
    {
        $user = $this->Users->newEmptyEntity();
        if ($this->request->is('post')) {
            // die('fghdjdhkjsldhfjk');
            $data = $this->request->getData();
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'userindex']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }

    public function add()
    {
        $user = $this->Authentication->getIdentity();
        if ($user->role == 0) {
            $car = $this->Cars->newEmptyEntity();
            if ($this->request->is('post')) {

                $data = $this->request->getData();

                $productImage = $this->request->getData("image");
                $fileName = $productImage->getClientFilename();
                $fileSize = $productImage->getSize();
                $data["image"] = $fileName;

                $car = $this->Cars->patchEntity($car, $data);
                if ($this->Cars->save($car)) {
                    $hasFileError = $productImage->getError();

                    if ($hasFileError > 0) {
                        $data["image"] = "";
                    } else {
                        $fileType = $productImage->getClientMediaType();

                        if ($fileType == "image/png" || $fileType == "image/jpeg" || $fileType == "image/jpg") {
                            $imagePath = WWW_ROOT . "img/" . $fileName;
                            $productImage->moveTo($imagePath);
                            $data["image"] = $fileName;
                        }
                    }

                    $this->Flash->success(__('The car has been saved.'));

                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }

            $brands = $this->Users->Brands->find('list', ['limit' => 200])->all()->toArray();
            $this->set(compact('car', 'brands'));
        } else {
            return $this->redirect(['action' => 'home']);
        }
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Authentication->getIdentity();
        if ($user->role == 0) {
            $car = $this->Cars->get($id, [
                'contain' => [],
            ]);
            $fileName2 = $car['image'];

            if ($this->request->is(['patch', 'post', 'put'])) {
                $data = $this->request->getData();
                $productImage = $this->request->getData("image");
                $fileName = $productImage->getClientFilename();
                if ($fileName == '') {
                    $fileName = $fileName2;
                }
                $fileSize = $productImage->getSize();
                $data["image"] = $fileName;
                $car = $this->Cars->patchEntity($car, $data);
                if ($this->Cars->save($car)) {
                    $hasFileError = $productImage->getError();

                    if ($hasFileError > 0) {
                        $data["image"] = "";
                    } else {
                        $fileType = $productImage->getClientMediaType();

                        if ($fileType == "image/png" || $fileType == "image/jpeg" || $fileType == "image/jpg") {
                            $imagePath = WWW_ROOT . "img/" . $fileName;
                            $productImage->moveTo($imagePath);
                            $data["image"] = $fileName;
                        }
                    }
                    $this->Flash->success(__('The car has been saved.'));

                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }
            $brands = $this->Users->Brands->find('list', ['limit' => 200])->all()->toArray();
            // $brands = $brand->toArray();
            // echo '<pre>'; print_r($brands[1]); die;
            $this->set(compact('car', 'brands'));
        } else {
            return $this->redirect(['action' => 'home']);
        }
    }

    public function useredit($id = null)
    {
        $user = $this->Authentication->getIdentity();
        if ($user->role == 0) {
            $user = $this->Users->get($id, [
                'contain' => [],
            ]);

            if ($this->request->is(['patch', 'post', 'put'])) {
                $user = $this->Users->patchEntity($user, $this->request->getData());
                if ($this->Users->save($user)) {

                    $this->Flash->success(__('The user has been saved.'));

                    return $this->redirect(['action' => 'userindex']);
                }
                $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }

            $this->set(compact('user'));
        } else {
            return $this->redirect(['action' => 'home']);
        }
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $car = $this->Cars->get($id);
        if ($this->Cars->delete($car)) {
            $this->Flash->success(__('The car has been deleted.'));
        } else {
            $this->Flash->error(__('The car could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function userdelete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'userindex']);
    }

    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);
        $this->Authentication->addUnauthenticatedActions(['login', 'register', 'home', 'view', 'redirectLogin']);
    }

    public function login()
    {
        $this->request->allowMethod(['get', 'post']);
        $result = $this->Authentication->getResult();
        if ($result && $result->isValid()) {

            $user = $this->Authentication->getIdentity();
            if ($user->role == 1) {
                $redirect = $this->request->getQuery('redirect', [
                    'controller' => 'Users',
                    'action' => 'home',
                ]);
            } elseif ($user->role == 0) {
                $redirect = $this->request->getQuery('redirect', [
                    'controller' => 'Users',
                    'action' => 'index',
                ]);
            }


            return $this->redirect($redirect);
        }
        if ($this->request->is('post') && !$result->isValid()) {
            $this->Flash->error(__('Invalid username or password'));
        }
    }

    public function logout()
    {
        $result = $this->Authentication->getResult();
        // regardless of POST or GET, redirect if user is logged in
        if ($result && $result->isValid()) {
            $this->Authentication->logout();
            return $this->redirect(['controller' => 'Users', 'action' => 'home']);
        }
    }

    public function status($id = null, $status = null)
    {
        $this->request->allowMethod(['post']);

        $car = $this->Cars->get($id);
        if ($status == 1) {
            $car->active = 0;
        } else {
            $car->active = 1;
        }
        if ($this->Cars->save($car)) {
            return $this->redirect(['controller' => 'Users', 'action' => 'index']);
        }
    }

    public function redirectLogin()
    {
        $this->Flash->error(__('Please login here for rate this car'));
        return $this->redirect(['action' => 'login']);
    }

    public $paginate = [
        'limit' => 5
    ];
}
