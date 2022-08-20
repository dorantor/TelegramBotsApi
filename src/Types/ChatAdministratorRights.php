<?php

declare(strict_types=1);

namespace Kuvardin\TelegramBotsApi\Types;

use Kuvardin\TelegramBotsApi\Type;

/**
 * Represents the rights of an administrator in a chat.
 *
 * @package Kuvardin\TelegramBotsApi
 * @author Maxim Kuvardin <maxim@kuvard.in>
 */
class ChatAdministratorRights extends Type
{
    /**
     * @var bool $is_anonymous <em>True</em>, if the user's presence in the chat is hidden
     */
    public bool $is_anonymous;

    /**
     * @var bool $can_manage_chat <em>True</em>, if the administrator can access the chat event log, chat statistics,
     *     message statistics in channels, see channel members, see anonymous administrators in supergroups and ignore
     *     slow mode. Implied by any other administrator privilege
     */
    public bool $can_manage_chat;

    /**
     * @var bool $can_delete_messages <em>True</em>, if the administrator can delete messages of other users
     */
    public bool $can_delete_messages;

    /**
     * @var bool $can_manage_video_chats <em>True</em>, if the administrator can manage video chats
     */
    public bool $can_manage_video_chats;

    /**
     * @var bool $can_restrict_members <em>True</em>, if the administrator can restrict, ban or unban chat members
     */
    public bool $can_restrict_members;

    /**
     * @var bool $can_promote_members <em>True</em>, if the administrator can add new administrators with a subset of
     *     their own privileges or demote administrators that he has promoted, directly or indirectly (promoted by
     *     administrators that were appointed by the user)
     */
    public bool $can_promote_members;

    /**
     * @var bool $can_change_info <em>True</em>, if the user is allowed to change the chat title, photo and other
     *     settings
     */
    public bool $can_change_info;

    /**
     * @var bool $can_invite_users <em>True</em>, if the user is allowed to invite new users to the chat
     */
    public bool $can_invite_users;

    /**
     * @var bool|null $can_post_messages <em>True</em>, if the administrator can post in the channel; channels only
     */
    public ?bool $can_post_messages = null;

    /**
     * @var bool|null $can_edit_messages <em>True</em>, if the administrator can edit messages of other users and can
     *     pin messages; channels only
     */
    public ?bool $can_edit_messages = null;

    /**
     * @var bool|null $can_pin_messages <em>True</em>, if the user is allowed to pin messages; groups and supergroups
     *     only
     */
    public ?bool $can_pin_messages = null;

    public static function makeByArray(array $data): self
    {
        $result = new self;
        $result->is_anonymous = $data['is_anonymous'];
        $result->can_manage_chat = $data['can_manage_chat'];
        $result->can_delete_messages = $data['can_delete_messages'];
        $result->can_manage_video_chats = $data['can_manage_video_chats'];
        $result->can_restrict_members = $data['can_restrict_members'];
        $result->can_promote_members = $data['can_promote_members'];
        $result->can_change_info = $data['can_change_info'];
        $result->can_invite_users = $data['can_invite_users'];
        $result->can_post_messages = $data['can_post_messages'] ?? null;
        $result->can_edit_messages = $data['can_edit_messages'] ?? null;
        $result->can_pin_messages = $data['can_pin_messages'] ?? null;
        return $result;
    }

    public function getRequestData(): array
    {
        return [
            'is_anonymous' => $this->is_anonymous,
            'can_manage_chat' => $this->can_manage_chat,
            'can_delete_messages' => $this->can_delete_messages,
            'can_manage_video_chats' => $this->can_manage_video_chats,
            'can_restrict_members' => $this->can_restrict_members,
            'can_promote_members' => $this->can_promote_members,
            'can_change_info' => $this->can_change_info,
            'can_invite_users' => $this->can_invite_users,
            'can_post_messages' => $this->can_post_messages,
            'can_edit_messages' => $this->can_edit_messages,
            'can_pin_messages' => $this->can_pin_messages,
        ];
    }
}