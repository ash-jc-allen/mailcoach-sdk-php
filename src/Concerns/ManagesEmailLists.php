<?php

namespace Spatie\MailcoachSdk\Concerns;

use Spatie\MailcoachSdk\Resources\EmailList;

trait ManagesEmailLists
{
    /**
     * @return array<int, EmailList>
     */
    public function emailLists(): array
    {
        return $this->transformCollection(
            $this->get('email-lists')['data'],
            EmailList::class,
        );
    }

    public function createEmailList(array $data): EmailList
    {
        $attributes = $this->post('email-lists', $data);

        return new EmailList($attributes, $this);
    }

    public function emailList(string $uuid): EmailList
    {
        $attributes = $this->get("email-lists/{$uuid}")['data'];

        return new EmailList($attributes, $this);
    }

    public function updateEmailList(string $uuid, array $data): EmailList
    {
        $attributes = $this->put("email-lists/{$uuid}", $data)['data'];

        return new EmailList($attributes, $this);
    }

    public function deleteEmailList(string $uuid): void
    {
        $this->delete("email-lists/{$uuid}");
    }
}
