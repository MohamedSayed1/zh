<?php


namespace App\ZH\Repository;


use App\ZH\Model\Term;

class TermsRepository
{
    private $termModel;

    public function __construct()
    {
        $this->termModel = new Term();
    }

    public function Terms()
    {
       return $this->termModel->all();
    }

    public function add($data)
    {


        return $this->termModel::create([
            'name' => $data['name'],
            'start_date' => $data['start_date'],
            'end_date' => $data['end_date'],
            'status' => 0,
        ]);

    }

    public function edit($id)
    {
        return $this->termModel->findOrFail($id);
    }

    public function update($data)
    {
        $term=$this->termModel->find($data['term_id']);
        return $term->update([
            'name' => $data['name'],
            'start_date' => $data['start_date'],
            'end_date' => $data['end_date'],
        ]);

    }
     public function activeTerms()
    {
        return $this->termModel->where('status','1')->get();
    }

    public function destroy($id)
    {
       $term= $this->termModel->find($id);
       if($term){
           $term->delete();
           return true;
       }
       return false;

    }

    public function toActive($id)
    {
       $acitve = $this->termModel->find($id);
       $acitve->status = 1;
       $acitve->save();
       $this->termModel->where('term_id','!=',$id)->update(['status'=>0]);
        return true;
    }


}
