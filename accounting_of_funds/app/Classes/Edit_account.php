<?php

namespace App\Classes;

class Edit_account
{
    public function __construct($new_values)
    {
        $this->new_values = $new_values;
        $this->edit();
    }

    private function edit(){

        $id = \Auth::user()->id;

        $edit = \App\Models\User::find($id);

        if(($this->new_values->name == NULL) && ($this->new_values->email == NULL)){

            abort( response(' <div style="color: red; width: 100%; vertical-align: middle; padding-top: 100px; text-align: center;"><h1>Bad Request (ERR code: 400)</h1></div> ', 400  ) );

        }else if(($this->new_values->name != NULL) && ($this->new_values->email != NULL)){

            $edit->name = $this->new_values->name;
            $edit->email = $this->new_values->email;
            $edit->save();

        }else if(($this->new_values->name != NULL) || ($this->new_values->email != NULL)){

            abort( response(' <div style="color: red; width: 100%; vertical-align: middle; padding-top: 100px; text-align: center;"><h1>Bad Request (ERR code: 400)</h1></div> ', 400  ) );

        }
    }
}