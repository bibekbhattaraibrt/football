<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class InviteController extends Controller
{
    /**
     *
     */
    public function __construct()
    {
    }

    public function email(Request $request)
    {
        $data = [];

        // @todo: place the validation logics somewhere else
        if ($request->isMethod('post')) {
            // Require only first row
            $validator = \Validator::make(
                $request->all(),
                ['invite.email.0' => 'required',
                 'invite.name.0' => 'required', ]
            );
            // Validate the inputs
            $validator->each('invite.email', ['email']);
            $validator->each('invite.name',  ['max:50', 'min:5']);
            $validator->setCustomMessages([
                'invite.email.0.required' => 'First row email required',
                'invite.name.0.required' => 'First row name required',
            ]);
            if ($validator->fails()) {
                return redirect($request->url())
                    ->withInput()
                    ->withErrors($validator->errors())
                ;
            }

            foreach ($request->input('invite.email') as $key => $email) {
                $name = $request->input('invite.name.'.$key, strstr($email, '@', true));
                // Sometimes exception is thrown even though mail is sent successfully
                try {
                    \Mail::send('emails.invitation', compact('name', 'email'), function ($mail) use ($email, $name) {
                        $mail
                            ->from('invitation@footies.report', 'Footies Report')
                            ->to($email, $name)
                            ->subject('Invitation to join Footies Report!')
                        ;
                    });
                } catch (\Exception $e) {
                    // Do nothing
                }
            }

            return redirect($request->url())
                ->with('success', 'Processed successfully')
            ;
        }

        return view('admin.invite.email', $data);
    }
}
