<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use Doctrine\ORM\Tools\Pagination\Paginator;
use Monks\Entities\Role;
use Illuminate\Http\Request;
use Doctrine\ORM\EntityManager;
use App\Http\Controllers\Controller;

class RoleController extends Controller
{
    /**
     * @var EntityManager
     */
    protected  $em;

    public function __construct()
    {
        $this->em = app('em');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($responseFormat = 'json')
    {
        $toReturn = [];
        $roleRepo = $this->em->getRepository('Monks\Entities\Role');
        $roles = $roleRepo->createQueryBuilder('r')
                    ->setMaxResults(1)
                    ->getQuery();
        $roles = new Paginator($roles, false);

        foreach ($roles as $role) {
            $toReturn['data'][] = [
                'id' => $role->getId(),
                'name' => $role->getName(),
            ];
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post = $request->request->all();
        $role = new Role();

        $role->setName($request->get('name'));
        $role->setDescription($request->get('description'));

        try {
            $this->em->persist($role);

            $this->em->flush();
            $this->em->clear();
        } catch(\Exception $e) {
            return redirect('admin/acl/roles')
                ->with('error', 'Unable to comply your request. Try again later!!');
        }

        return redirect('admin/acl/roles');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
