<?php


namespace App\Repositories;

use App\Models\Feedback as Model;

/**
 * Class FeedbackRepository
 *
 * @package App\Repositories
 * @method Model startCondition(): Model
 * @property Model model
 */
class FeedbackRepository extends MainRepository
{
    /**
     * Get Model class name
     * @return mixed|string
     */
    protected function getModelClass()
    {
        return Model::class;
    }

    /**
     * Get necessary Feedback
     * @param int $id
     * @return Model|null
     */
    public function getEdit(int $id): ?Model
    {
        return $this->startCondition()->find($id);
    }

    /**
     * Get structure for Paginate with Feedbacks
     * @param int|null $count
     * @return mixed
     */
    public function getAllWithPaginate(int $count = null)
    {
        $properties = [
            'id',
            'name',
            'email',
            'status'
        ];
        $result = $this->startCondition()
            ->select($properties)
            ->paginate($count);
        return $result;
    }
}
