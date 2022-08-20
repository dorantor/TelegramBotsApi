<?php

declare(strict_types=1);

namespace Kuvardin\TelegramBotsApi\Types;

use Kuvardin\TelegramBotsApi\Type;

/**
 * Describes actions that a non-administrator user is allowed to take in a chat.
 *
 * @package Kuvardin\TelegramBotsApi
 * @author Maxim Kuvardin <maxim@kuvard.in>
 */
class ChatPermissions extends Type
{
    /**
     * @var bool|null $can_send_messages <em>True</em>, if the user is allowed to send text messages, contacts,
     *     locations and venues
     */
    public ?bool $can_send_messages = null;

    /**
     * @var bool|null $can_send_media_messages <em>True</em>, if the user is allowed to send audios, documents, photos,
     *     videos, video notes and voice notes, implies can_send_messages
     */
    public ?bool $can_send_media_messages = null;

    /**
     * @var bool|null $can_send_polls <em>True</em>, if the user is allowed to send polls, implies can_send_messages
     */
    public ?bool $can_send_polls = null;

    /**
     * @var bool|null $can_send_other_messages <em>True</em>, if the user is allowed to send animations, games,
     *     stickers and use inline bots, implies can_send_media_messages
     */
    public ?bool $can_send_other_messages = null;

    /**
     * @var bool|null $can_add_web_page_previews <em>True</em>, if the user is allowed to add web page previews to
     *     their messages, implies can_send_media_messages
     */
    public ?bool $can_add_web_page_previews = null;

    /**
     * @var bool|null $can_change_info <em>True</em>, if the user is allowed to change the chat title, photo and other
     *     settings. Ignored in public supergroups
     */
    public ?bool $can_change_info = null;

    /**
     * @var bool|null $can_invite_users <em>True</em>, if the user is allowed to invite new users to the chat
     */
    public ?bool $can_invite_users = null;

    /**
     * @var bool|null $can_pin_messages <em>True</em>, if the user is allowed to pin messages. Ignored in public
     *     supergroups
     */
    public ?bool $can_pin_messages = null;

    public static function makeByArray(array $data): self
    {
        $result = new self;
        $result->can_send_messages = $data['can_send_messages'] ?? null;
        $result->can_send_media_messages = $data['can_send_media_messages'] ?? null;
        $result->can_send_polls = $data['can_send_polls'] ?? null;
        $result->can_send_other_messages = $data['can_send_other_messages'] ?? null;
        $result->can_add_web_page_previews = $data['can_add_web_page_previews'] ?? null;
        $result->can_change_info = $data['can_change_info'] ?? null;
        $result->can_invite_users = $data['can_invite_users'] ?? null;
        $result->can_pin_messages = $data['can_pin_messages'] ?? null;
        return $result;
    }

    public function getRequestData(): array
    {
        return [
            'can_send_messages' => $this->can_send_messages,
            'can_send_media_messages' => $this->can_send_media_messages,
            'can_send_polls' => $this->can_send_polls,
            'can_send_other_messages' => $this->can_send_other_messages,
            'can_add_web_page_previews' => $this->can_add_web_page_previews,
            'can_change_info' => $this->can_change_info,
            'can_invite_users' => $this->can_invite_users,
            'can_pin_messages' => $this->can_pin_messages,
        ];
    }
}