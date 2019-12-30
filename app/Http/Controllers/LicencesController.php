<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Licence;

/**
 * @OA\Tag(
 *     name="Тусгай зөвшөөрөл",
 *     description="Тусгай зөвшөөрөл эзэмшигчдийн мэдээлэл",
 * )
 **/
class LicencesController extends Controller
{
    /**
     * @OA\GET(
     *     path="/api/v1/licences/{id}",
     *     tags={"Тусгай зөвшөөрөл"},
     *     summary="Тусгай зөвшөөрлийг буцаана",
     *     description="Тусгай зөвшөөрөл эзэмшигчийн мэдээллийг буцаана",
     *     operationId="view",
     *    @OA\Parameter(
     *         description="Зөвшөөрлийн ID",
     *         in="path",
     *         name="id",
     *         required=true,
     *         @OA\Schema(
     *           type="integer",
     *           format="int64"
     *         )
     *     ),
     *     @OA\Response(
     *         response="200",
     *         description="Амжилттай",
     *         @OA\JsonContent(ref="#/components/schemas/Licence")
     *     ),
     *    @OA\Response(
     *         response="404",
     *         description="Зөвшөөрөл олдоогүй"
     *     ),
     * )
     */
    public function view($id)
    {
        return Licence::find($id)->toJson();
    }

    /**
     * @OA\GET(
     *     path="/api/v1/licences",
     *     tags={"Тусгай зөвшөөрөл"},
     *     summary="Тусгай зөвшөөрлийн жагсаалт",
     *     description="Тусгай зөвшөөрөл эзэмшигчийн мэдээллийг буцаана. Зөвшөөрөл авсан огноогоор шүүж болох ба хуудаслалттай. Нэг хуудаст 50 мэдээлэл ирнэ. from огноог дамжуулаагүй бол жилийн эхний өдрөөс хойшихыг буцаана.",
     *     operationId="index",
     *     @OA\Parameter(
     *         description="Эхлэх огноо, yyyy-MM-dd",
     *         name="from",
     *         in="query",
     *         required=false,
     *         @OA\Schema(
     *           type="Date",
     *           format="yyyy-MM-dd"
     *         )
     *     ),
     *     @OA\Parameter(
     *         description="Төгсгөл огноо, yyyy-MM-dd",
     *         name="to",
     *         in="query",
     *         required=false,
     *         @OA\Schema(
     *           type="Date",
     *           format="yyyy-MM-dd"
     *         )
     *     ),
     *     @OA\Parameter(
     *         description="Хуудасны дугаар",
     *         name="page",
     *         in="query",
     *         required=false,
     *         @OA\Schema(
     *           type="int",
     *           format="int"
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Амжилттай",
     *         @OA\Schema(type="array", @OA\Items(ref="#/components/schemas/Licence")),
     *     )
     * )
     */
    public function index(Request $request)
    {
        if ($request->has('from'))
            $from = Carbon::parse($request->from);
        else
            $from = Carbon::now()->firstOfYear();
        $to = Carbon::parse($request->to);
        return Licence::whereBetween('begindate', [$from, $to])->orderBy('begindate')->paginate(50);
    }
}