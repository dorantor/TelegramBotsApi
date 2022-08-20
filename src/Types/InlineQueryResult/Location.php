<?php

declare(strict_types=1);

namespace Kuvardin\TelegramBotsApi\Types\InlineQueryResult;

use Kuvardin\TelegramBotsApi\Types\InlineKeyboardMarkup;
use Kuvardin\TelegramBotsApi\Types\InlineQueryResult;
use Kuvardin\TelegramBotsApi\Types\InputMessageContent;
use RuntimeException;

/**
 * Represents a location on a map. By default, the location will be sent by the user. Alternatively, you can use
 * <em>input_message_content</em> to send a message with the specified content instead of the location.
 *
 * @package Kuvardin\TelegramBotsApi
 * @author Maxim Kuvardin <maxim@kuvard.in>
 */
class Location extends InlineQueryResult
{
    /**
     * @var string $id Unique identifier for this result, 1-64 Bytes
     */
    public string $id;

    /**
     * @var float $latitude Location latitude in degrees
     */
    public float $latitude;

    /**
     * @var float $longitude Location longitude in degrees
     */
    public float $longitude;

    /**
     * @var string $title Location title
     */
    public string $title;

    /**
     * @var float|null $horizontal_accuracy The radius of uncertainty for the location, measured in meters; 0-1500
     */
    public ?float $horizontal_accuracy = null;

    /**
     * @var int|null $live_period Period in seconds for which the location can be updated, should be between 60 and
     *     86400.
     */
    public ?int $live_period = null;

    /**
     * @var int|null $heading For live locations, a direction in which the user is moving, in degrees. Must be between
     *     1 and 360 if specified.
     */
    public ?int $heading = null;

    /**
     * @var int|null $proximity_alert_radius For live locations, a maximum distance for proximity alerts about
     *     approaching another chat member, in meters. Must be between 1 and 100000 if specified.
     */
    public ?int $proximity_alert_radius = null;

    /**
     * @var InlineKeyboardMarkup|null $reply_markup <a
     *     href="https://core.telegram.org/bots#inline-keyboards-and-on-the-fly-updating">Inline keyboard</a> attached
     *     to the message
     */
    public ?InlineKeyboardMarkup $reply_markup = null;

    /**
     * @var InputMessageContent|null $input_message_content Content of the message to be sent instead of the location
     */
    public ?InputMessageContent $input_message_content = null;

    /**
     * @var string|null $thumb_url Url of the thumbnail for the result
     */
    public ?string $thumb_url = null;

    /**
     * @var int|null $thumb_width Thumbnail width
     */
    public ?int $thumb_width = null;

    /**
     * @var int|null $thumb_height Thumbnail height
     */
    public ?int $thumb_height = null;

    public static function getType(): string
    {
        return 'location';
    }

    public static function makeByArray(array $data): static
    {
        $result = new self;

        if ($data['type'] !== self::getType()) {
            throw new RuntimeException("Wrong inline query result type: {$data['type']}");
        }

        $result->id = $data['id'];
        $result->latitude = $data['latitude'];
        $result->longitude = $data['longitude'];
        $result->title = $data['title'];
        $result->horizontal_accuracy = $data['horizontal_accuracy'] ?? null;
        $result->live_period = $data['live_period'] ?? null;
        $result->heading = $data['heading'] ?? null;
        $result->proximity_alert_radius = $data['proximity_alert_radius'] ?? null;
        $result->reply_markup = isset($data['reply_markup'])
            ? InlineKeyboardMarkup::makeByArray($data['reply_markup'])
            : null;
        $result->input_message_content = isset($data['input_message_content'])
            ? InputMessageContent::makeByArray($data['input_message_content'])
            : null;
        $result->thumb_url = $data['thumb_url'] ?? null;
        $result->thumb_width = $data['thumb_width'] ?? null;
        $result->thumb_height = $data['thumb_height'] ?? null;
        return $result;
    }

    public function getRequestData(): array
    {
        return [
            'type' => self::getType(),
            'id' => $this->id,
            'latitude' => $this->latitude,
            'longitude' => $this->longitude,
            'title' => $this->title,
            'horizontal_accuracy' => $this->horizontal_accuracy,
            'live_period' => $this->live_period,
            'heading' => $this->heading,
            'proximity_alert_radius' => $this->proximity_alert_radius,
            'reply_markup' => $this->reply_markup,
            'input_message_content' => $this->input_message_content,
            'thumb_url' => $this->thumb_url,
            'thumb_width' => $this->thumb_width,
            'thumb_height' => $this->thumb_height,
        ];
    }
}