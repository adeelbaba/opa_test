<?php

class AdminUsersController extends AdminController
{


    /**
     * User Model
     * @var User
     */
    protected $user;

    /**
     * Role Model
     * @var Role
     */
    protected $role;

    /**
     * Permission Model
     * @var Permission
     */
    protected $permission;

    /**
     * Inject the models.
     * @param User $user
     * @param Role $role
     * @param Permission $permission
     */
    public function __construct(User $user, Role $role, Permission $permission)
    {
        parent::__construct();
        $this->user = $user;
        $this->role = $role;
        $this->permission = $permission;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function getIndex()
    {
        // Title
        $title = Lang::get('admin/users/title.user_management');

        // Grab all the users
        $users = $this->user;

        // Show the page
        return View::make('admin/users/index', compact('users', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function getCreate()
    {
        // All roles
        $roles = $this->role->all();

        // Get all the available permissions
        $permissions = $this->permission->all();

        // Selected groups
        $selectedRoles = Input::old('roles', array());

        // Selected permissions
        $selectedPermissions = Input::old('permissions', array());

        // Title
        $title = Lang::get('admin/users/title.create_a_new_user');

        // Mode
        $mode = 'create';

        // Show the page
        return View::make('admin/users/create_edit', compact('roles', 'permissions', 'selectedRoles', 'selectedPermissions', 'title', 'mode'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function postCreate()
    {

        $this->user->username = Input::get('username');
        $this->user->email = Input::get('email');
        $this->user->password = Input::get('password');

        // The password confirmation will be removed from model
        // before saving. This field will be used in Ardent's
        // auto validation.
        $this->user->password_confirmation = Input::get('password_confirmation');

        // Generate a random confirmation code
        $this->user->confirmation_code = md5(uniqid(mt_rand(), true));

        if (Input::get('confirm')) {
            $this->user->confirmed = Input::get('confirm');
        }

        // Permissions are currently tied to roles. Can't do this yet.
        //$user->permissions = $user->roles()->preparePermissionsForSave(Input::get( 'permissions' ));

        // Save if valid. Password field will be hashed before save
        $this->user->save();

        if ($this->user->id) {
            // Save roles. Handles updating.
            $this->user->saveRoles(Input::get('roles'));

            if (Config::get('confide::signup_email')) {
                $user = $this->user;
                Mail::queueOn(
                    Config::get('confide::email_queue'),
                    Config::get('confide::email_account_confirmation'),
                    compact('user'),
                    function ($message) use ($user) {
                        $message
                            ->to($user->email, $user->username)
                            ->subject(Lang::get('confide::confide.email.account_confirmation.subject'));
                    }
                );
            }

            // Redirect to the new user page
            return Redirect::to('admin/users/' . $this->user->id . '/edit')
                ->with('success', Lang::get('admin/users/messages.create.success'));

        } else {

            // Get validation errors (see Ardent package)
            $error = $this->user->errors()->all();

            return Redirect::to('admin/users/create')
                ->withInput(Input::except('password'))
                ->with('error', $error);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param $user
     * @return Response
     */
    public function getShow($user)
    {
        // redirect to the frontend
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $user
     * @return Response
     */
    public function getEdit($user)
    {
        if ($user->id) {
            $roles = $this->role->all();
            $permissions = $this->permission->all();

            // Title
            $title = Lang::get('admin/users/title.user_update');
            // mode
            $mode = 'edit';

            return View::make('admin/users/create_edit', compact('user', 'roles', 'permissions', 'title', 'mode'));
        } else {
            return Redirect::to('admin/users')->with('error', Lang::get('admin/users/messages.does_not_exist'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param User $user
     * @return Response
     */
    public function postEdit($user)
    {
        $oldUser = clone $user;
        $user->first_name = Input::get('firstname');
        $user->last_name = Input::get('lastname');
        $user->organization = Input::get('organization');
        $user->role = Input::get(value('selectrole'));
        $user->department = Input::get(value('selectdepartment'));
        $user->username = Input::get('username');
        $user->email = Input::get('email');
        $user->confirmed = Input::get('confirm');


        $password = Input::get('password');
        $passwordConfirmation = Input::get('password_confirmation');

        if (!empty($password)) {
            if ($password === $passwordConfirmation) {
                $user->password = $password;
                // The password confirmation will be removed from model
                // before saving. This field will be used in Ardent's
                // auto validation.
                $user->password_confirmation = $passwordConfirmation;
            } else {
                // Redirect to the new user page
                return Redirect::to('admin/users/' . $user->id . '/edit')->with('error', Lang::get('admin/users/messages.password_does_not_match'));
            }
        }

        if ($user->confirmed == null) {

            //Fahad Editing
            $user->confirmed = $oldUser->confirmed;
        }

        if ($user->save()) {
            // Save roles. Handles updating.
            $user->saveRoles(Input::get('roles'));
        } else {
            return Redirect::to('admin/users/' . $user->id . '/edit')
                ->with('error', Lang::get('admin/users/messages.edit.error'));
        }

        // Get validation errors (see Ardent package)
        $error = $user->errors()->all();

        if (empty($error)) {
            // Redirect to the new user page
            return Redirect::to('admin/users/' . $user->id . '/edit')->with('success', Lang::get('admin/users/messages.edit.success'));
        } else {
            return Redirect::to('admin/users/' . $user->id . '/edit')->with('error', Lang::get('admin/users/messages.edit.error'));
        }
    }

    /**
     * Remove user page.
     *
     * @param $user
     * @return Response
     */
    public function getDelete($user)
    {
        // Title
        $title = Lang::get('admin/users/title.user_delete');

        // Show the page
        return View::make('admin/users/delete', compact('user', 'title'));
    }

    /**
     * Remove the specified user from storage.
     *
     * @param $user
     * @return Response
     */
    public function postDelete($user)
    {
        // Check if we are not trying to delete ourselves
        if ($user->id === Confide::user()->id) {
            // Redirect to the user management page
            return Redirect::to('admin/users')->with('error', Lang::get('admin/users/messages.delete.impossible'));
        }

        AssignedRoles::where('user_id', $user->id)->delete();

        $id = $user->id;
        $user->delete();

        // Was the comment post deleted?
        $user = User::find($id);
        if (empty($user)) {
            // TODO needs to delete all of that user's content
            return Redirect::to('admin/users')->with('success', Lang::get('admin/users/messages.delete.success'));
        } else {
            // There was a problem deleting the user
            return Redirect::to('admin/users')->with('error', Lang::get('admin/users/messages.delete.error'));
        }
    }

    /**
     * Show a list of all the users formatted for Datatables.
     *
     * @return Datatables JSON
     */
    public function getData()
    {
        $users = User::leftjoin('assigned_roles', 'assigned_roles.user_id', '=', 'users.id')
            ->leftjoin('roles', 'roles.id', '=', 'assigned_roles.role_id')
            ->select(array('users.id', 'users.username', 'users.first_name', 'users.last_name', 'users.organization', 'users.department', 'users.role', 'users.email', 'roles.name as rolename', 'users.confirmed', 'users.created_at', 'users.isRejected'));

        //                          @if($isRejected == 1)
//                                   <a href="{{{ URL::to(\'admin/users/\' . $id . \'/activate\' ) }}}" class="iframe btn btn-xs btn-info">{{{ Lang::get(\'Activate\') }}}</a>
//                                @elseif($confirmed == 0)

        return Datatables::of($users)
            // ->edit_column('created_at','{{{ Carbon::now()->diffForHumans(Carbon::createFromFormat(\'Y-m-d H\', $test)) }}}')
            ->edit_column('confirmed', '@if ($isRejected==1)
                    Rejected
                @elseif ($confirmed==1)
                    Activated
                @elseif ($confirmed==0)
                    New
                @endif'
            )
            ->add_column('actions', '<a href="{{{ URL::to(\'admin/users/\' . $id . \'/edit\' ) }}}" class="iframe btn btn-xs btn-default">{{{ Lang::get(\'button.edit\') }}}</a>
                                @if($username == \'admin\')
                                @else
                                    <a href="{{{ URL::to(\'admin/users/\' . $id . \'/delete\' ) }}}" class="iframe btn btn-xs btn-danger">{{{ Lang::get(\'button.delete\') }}}</a>
                                @endif
                                @if($confirmed==0)
                                <a href="{{{ URL::to(\'admin/users/\' . $id . \'/activate\' ) }}}"class="iframe btn btn-xs btn-info">{{{ Lang::get(\'Activate\') }}}</a>
                                <a href="{{{ URL::to(\'admin/users/\' . $id . \'/reject\' ) }}}"class="iframe btn btn-xs btn-info">{{{ Lang::get(\'Reject\') }}}</a>
                                @elseif($confirmed==2)
                                <a href="{{{ URL::to(\'admin/users/\' . $id . \'/activate\' ) }}}"class="iframe btn btn-xs btn-info">{{{ Lang::get(\'Activate\') }}}</a>
                                 @endif
            ')
            ->remove_column('id')
            ->make();
    }

    public function rejectionEmail($user)
    {
        Log::info(">>> User Rejection Email " . $user);
        $updated = DB::table('users')
            ->where('id', $user->id)
            ->update(array('isRejected' => '1', 'confirmed' => '0'));
        //->update(array('isRejected' => '1'));

        Log::info(">>> User Rejection Email DB Updated" . $updated);

        if ($updated) {
            Log::info(">>> User Rejection Email - inside if check ");
            Mail::send('emails/auth/account_rejection_email', array('name' => $user->username),
                function ($message) use ($user) {
                    $message
                        ->to($user->email, $user->username)
                        ->subject('Open-Payments');

                });

            Log::info(">>> User Reject Email should have been sent");
            /**
             * Mail::queueOn(
             * Config::get('confide::email_queue'),
             * Config::get('confide::email_account_confirmation'),
             * compact('user'),
             * function ($message) use ($user) {
             * $message
             * ->to($user->email, $user->username)
             * ->subject(Lang::get('confide::confide.alerts.account_created.subject'));
             * }
             * );
             *
             * }
             */

            $title = 'Account Request Update';
            return View::make('admin/users/confirmation_email', compact('users', 'title'));
        }

    }

    public function activateUser($user)
    {
        $updated = DB::table('users')
            ->where('id', $user->id)
            ->update(array('confirmed' => '1', 'isRejected' => '0'));


        if ($updated) {
            Mail::send('emails/auth/account_activated_email', array('name' => $user->username),
                function ($message) use ($user) {
                    $message
                        ->to($user->email, $user->username)
                        ->subject('Open-Payments Account Activated');

                });
            /**
             * Mail::queueOn(
             * Config::get('confide::email_queue'),
             * Config::get('confide::email_account_confirmation'),
             * compact('user'),
             * function ($message) use ($user) {
             * $message
             * ->to($user->email, $user->username)
             * ->subject(Lang::get('confide::confide.alerts.account_created.subject'));
             * }
             * );
             *
             * }
             */

            $title = 'Account Activated!';
            return View::make('admin/users/confirmation_email', compact('users', 'title'));

        }
    }

}
