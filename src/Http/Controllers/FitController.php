<?php

namespace Seat\Kassie\Doctrines\Http\Controllers;

use Illuminate\Http\Request;

use Seat\Web\Http\Controllers\Controller;

use Seat\Kassie\Doctrines\Models\Fit;
use Seat\Kassie\Doctrines\Models\Category;
use Seat\Kassie\Doctrines\Exceptions\DoctrinesFitParseException;

use Seat\Kassie\Doctrines\Helpers\ParserEFT;

class FitController extends Controller
{

	public function index()
	{	
		return view('doctrines::fit.index', []);
	}

	public function indexStore()
	{
		$fit = null;
		$raw_eft = null;
		$raw_cargo = null;
		$err = null;

		if (session()->has('fit')) {
			try {
				$parsedFit = ParserEFT::Parse(session('fit'), session('cargo'));
				$fit = Fit::find($parsedFit->id);
			}
			catch (DoctrinesFitParseException $e) {
				$err = $e->getMessage();
			}
			catch (DoctrinesItemNotAModuleException $e) {
				$err = $e->getMessage();
			}

			$raw_eft = session('fit');
			$raw_cargo = session('cargo');

			session()->forget('fit');
			session()->forget('cargo');
		}

		$categories = Category::all()->sortBy('name');

		return view('doctrines::fit.create', [
			'err' => $err,
			'fit' => $fit,
			'raw_eft' => $raw_eft,
			'raw_cargo' => $raw_cargo,
			'categories' => $categories
		]);
	}

	public function indexStorePreview(Request $request)
	{
		session([
			'fit' => $request->eft,
			'cargo' => $request->cargo
		]);
		return redirect()->route('doctrines.fit.indexStore');
	}

}