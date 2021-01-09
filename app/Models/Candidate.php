<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
/**
 * Candidate Model
 * @author  Yifan Wu
 * @package Model
 */
class Candidate extends Model //inheritance
{
    protected $table = 'candidate';
    public $timestamps = false;

    protected $fillable = [
        'c_id',
        'c_name',
        'description',
        'vote_id'
    ];

    public function addCandidate($name,$description,$vote_id){
        $this->create([
            'c_name' => $name,
            'description' => $description,
            'vote_id' => $vote_id
        ]);
    }

    public function updateCandidate($name,$description){
        $this->update([
            'c_name' => $name,
            'description' => $description
        ]);
    }

    public function delCandidate($id){
        $this->where('c_id',$id)->delete();
    }
}