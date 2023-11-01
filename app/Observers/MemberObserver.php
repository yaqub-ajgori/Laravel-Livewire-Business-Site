<?php

namespace App\Observers;

use App\Models\Member;
use Illuminate\Support\Facades\Storage;

class MemberObserver
{

    public function afterModelSaved(Member $member): void
    {
        if (!is_null($member->getOriginal('image')) && $member->isDirty('image')) {
            Storage::disk('public')->delete($member->getOriginal('image'));
        }
    }


    public function deleted(Member $member): void
    {
        if (! is_null($member->image)) {
            Storage::disk('public')->delete($member->image);
        }

    }


}
