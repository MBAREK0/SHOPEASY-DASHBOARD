<?php
    namespace App\Http\Controllers;
    use App\Models\Client;
    use Illuminate\Http\Request;

    class ClientControlller extends Controller
    {
        //
        public function list_clients(){
            $clients= Client::latest()->paginate(10);
            return view('client.index', compact('clients'));
        }

        public function add_client(Request $request) {

                   $check= new MyvalidateController($request);

     $result=$check->myValidate([
                'name' => 'required',
                'email' => 'required',
                'carte_bancaire' => 'required',
                'adress' => 'required',
            ]);
        if($result !== 'secces'){
            return  back()->withErrors($result); 

            }
            Client::create([
                'name' => $request->name,
                'email' => $request->email,
                'carte_bancaire' => $request->carte_bancaire,
                'adress' => $request->adress,
            ]);
        
            return redirect('/clients');
        }
        
        public function delete_client($id){
            $client =Client::find($id);
            $client->delete();
            return redirect('/clients');
        }

        public function edit_client($id){
            $client =Client::find($id);
            return view('client.edit', compact('client'));

        }

        public function update_client(Request $request, $id) {
                    $check= new MyvalidateController($request);

     $result=$check->myValidate([
                'name' => 'required',
                'email' => 'required|email|unique:clients,email,'.$id,
                'carte_bancaire' => 'required|unique:clients,carte_bancaire,'.$id,
                'adress' => 'required',
            ]);
            if($result !== 'secces'){
            return  back()->withErrors($result); 

            }
        
            Client::where('id', $id)->update([
                'name' => $request->name,
                'email' => $request->email,
                'carte_bancaire' => $request->carte_bancaire,
                'adress' => $request->adress,
            ]);
        
            return redirect('/clients');
        }
        

    }
    