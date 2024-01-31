<?php
    namespace App\Http\Controllers;
    use App\Models\Client;
    use Illuminate\Http\Request;

    class ClientControlller extends Controller
    {
        //
        public function list_clients(){
            $clients= Client::all();
            return view('client.index', compact('clients'));
        }

        public function add_client(Request $request) {
            $request->validate([
                'name' => 'required',
                'email' => 'required',
                'carte_bancaire' => 'required',
                'adress' => 'required',
            ]);
        
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
            $request->validate([
                'name' => 'required',
                'email' => 'required|email|unique:clients,email,'.$id,
                'carte_bancaire' => 'required|unique:clients,carte_bancaire,'.$id,
                'adress' => 'required',
            ]);
        
            Client::where('id', $id)->update([
                'name' => $request->name,
                'email' => $request->email,
                'carte_bancaire' => $request->carte_bancaire,
                'adress' => $request->adress,
            ]);
        
            return redirect('/clients');
        }
        

    }
    