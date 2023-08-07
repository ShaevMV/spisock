<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\PriglasheniyeRequest;
use Auth;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Shared\Domain\ValueObject\Uuid;
use Spisok\Priglasheniye\Application\PriglasheniyeApplication;

class PriglasheniyeController extends Controller
{
    public function create(
        PriglasheniyeRequest $request,
        PriglasheniyeApplication $application
    ): Redirector|Application|RedirectResponse
    {
        $application->create($request, new Uuid((string)Auth::id()));

        return redirect('/')
            ->with('status', 'Заявка принята, дождитесь одобрения одобрения. Билеты придут на указанную почту!');
    }
}
