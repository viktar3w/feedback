<?php


namespace App\Repositories;

use App\Models\Feedback as Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\HasMany;

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
    public function getEdit(int $id)
    {
        return $this->startCondition()
            ->find($id);
    }

    /**
     * Get necessary Feedback
     * @param int $id
     * @return Model|null
     */
    public function getShow(int $id)
    {
        return $this->startCondition()
            ->with(['userFeedbackLogs' => function (HasMany $query) {
                $query->with('user');
            }])
            ->find($id);
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
