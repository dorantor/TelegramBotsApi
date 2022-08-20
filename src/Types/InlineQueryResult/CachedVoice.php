<?php

declare(strict_types=1);

namespace Kuvardin\TelegramBotsApi\Types\InlineQueryResult;

use Kuvardin\TelegramBotsApi\Types\InlineKeyboardMarkup;
use Kuvardin\TelegramBotsApi\Types\InlineQueryResult;
use Kuvardin\TelegramBotsApi\Types\InputMessageContent;
use Kuvardin\TelegramBotsApi\Types\MessageEntity;
use RuntimeException;

/**
 * Represents a link to a voice message stored on the Telegram servers. By default, this voice message will be sent by
 * the user. Alternatively, you can use <em>input_message_content</em> to send a message with the specified content
 * instead of the voice message.
 *
 * @package Kuvardin\TelegramBotsApi
 * @author Maxim Kuvardin <maxim@kuvard.in>
 */
class CachedVoice extends InlineQueryResult
{
    /**
     * @var string $id Unique identifier for this result, 1-64 bytes
     */
    public string $id;

    /**
     * @var string $voice_file_id A valid file identifier for the voice message
     */
    public string $voice_file_id;

    /**
     * @var string $title Voice message title
     */
    public string $title;

    /**
     * @var string|null $caption Caption, 0-1024 characters after entities parsing
     */
    public ?string $caption = null;

    /**
     * @var string|null $parse_mode Mode for parsing entities in the voice message caption. See <a
     *     href="https://core.telegram.org/bots/api#formatting-options">formatting options</a> for more details.
     */
    public ?string $parse_mode = null;

    /**
     * @var MessageEntity[]|null $caption_entities List of special entities that appear in the caption, which can be
     *     specified instead of <em>parse_mode</em>
     */
    public ?array $caption_entities = null;

    /**
     * @var InlineKeyboardMarkup|null $reply_markup <a
     *     href="https://core.telegram.org/bots#inline-keyboards-and-on-the-fly-updating">Inline keyboard</a> attached
     *     to the message
     */
    public ?InlineKeyboardMarkup $reply_markup = null;

    /**
     * @var InputMessageContent|null $input_message_content Content of the message to be sent instead of the voice
     *     message
     */
    public ?InputMessageContent $input_message_content = null;

    public static function getType(): string
    {
        return 'voice';
    }

    public static function makeByArray(array $data): static
    {
        $result = new self;

        if ($data['type'] !== self::getType()) {
            throw new RuntimeException("Wrong inline query result type: {$data['type']}");
        }

        $result->id = $data['id'];
        $result->voice_file_id = $data['voice_file_id'];
        $result->title = $data['title'];
        $result->caption = $data['caption'] ?? null;
        $result->parse_mode = $data['parse_mode'] ?? null;
        if (isset($data['caption_entities'])) {
            $result->caption_entities = [];
            foreach ($data['caption_entities'] as $item_data) {
                $result->caption_entities[] = MessageEntity::makeByArray($item_data);
            }
        }
        $result->reply_markup = isset($data['reply_markup'])
            ? InlineKeyboardMarkup::makeByArray($data['reply_markup'])
            : null;
        $result->input_message_content = isset($data['input_message_content'])
            ? InputMessageContent::makeByArray($data['input_message_content'])
            : null;
        return $result;
    }

    public function getRequestData(): array
    {
        return [
            'type' => self::getType(),
            'id' => $this->id,
            'voice_file_id' => $this->voice_file_id,
            'title' => $this->title,
            'caption' => $this->caption,
            'parse_mode' => $this->parse_mode,
            'caption_entities' => $this->caption_entities,
            'reply_markup' => $this->reply_markup,
            'input_message_content' => $this->input_message_content,
        ];
    }
}