<?php

namespace Tests\Unit;

use Modules\Diary\DairyWriter;
use Modules\Diary\Emotion;
use Modules\User\Entities\User;
use Carbon\Carbon;
use Tests\TestCase;
use Laravel\Passport\Passport;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class DiaryWriterTest extends TestCase
{
    use DatabaseTransactions;

    public function testCreateDiaryWithoutData()
    {
        Passport::actingAs($user = factory(User::class)->create());

        $diary = $user->createDiary();

        $this->assertInstanceOf('Modules\Diary\DiaryWriter', $diary);
    }

    public function testCreateDiary()
    {
        Passport::actingAs($user = factory(User::class)->create());

        $data = [
            'emotions' => [
                ['id' => rand(1, 100)],
                ['id' => rand(1, 100)],
                ['id' => rand(1, 100)],
                ['id' => rand(1, 100)],
                ['id' => rand(1, 100)],
            ]
        ];

        $diary = $user->createDiary(json_encode($data));

        $this->assertInstanceOf('Modules\Diary\DiaryWriter', $diary);

        $diary = $user->diaries()->first();
        $this->assertEquals(json_encode($data), json_encode($diary->data));
    }

    public function testCreateNewPage()
    {
        Passport::actingAs($user = factory(User::class)->create());

        $diary = $user->createDiary();
        $page = $diary->newPage();

        $this->assertInstanceOf('Modules\Diary\PageManager', $page);

        // Test if date on page is today
        $this->assertEquals(Carbon::today()->toDateString(), $page->data()->date);

        // Test if page is on pages from diary
        $createdPage = $diary->data()->pages()->first();
        $this->assertEquals($createdPage->id, $page->data()->id);
    }

    /**
     * [testWriteNote description]
     * @return [type] [description]
     * @todo Test write note
     */
    public function testWriteNote()
    {
        Passport::actingAs($user = factory(User::class)->create());

        $diary = $user->createDiary();
        $page = $diary->newPage();

        $emotion = Emotion::find(1);

        $note = $page->writeNote($emotion, 0);

        $this->assertInstanceOf('Modules\Diary\DiaryPageNote', $note);
        $this->assertEquals('Modules\Diary\Emotion', $note->noteable_type);
        $this->assertEquals(0, $note->data);
    }
}
