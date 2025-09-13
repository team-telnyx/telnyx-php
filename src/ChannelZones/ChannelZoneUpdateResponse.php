<?php

declare(strict_types=1);

namespace Telnyx\ChannelZones;

use Telnyx\ChannelZones\ChannelZoneUpdateResponse\RecordType;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type channel_zone_update_response = array{
 *   id: string,
 *   channels: int,
 *   countries: list<string>,
 *   name: string,
 *   recordType: value-of<RecordType>,
 *   createdAt?: string,
 *   updatedAt?: string,
 * }
 * When used in a response, this type parameter can be used to define a $rawResponse property.
 * @template TRawResponse of object = object{}
 *
 * @mixin TRawResponse
 */
final class ChannelZoneUpdateResponse implements BaseModel
{
    /** @use SdkModel<channel_zone_update_response> */
    use SdkModel;

    #[Api]
    public string $id;

    #[Api]
    public int $channels;

    /**
     * List of countries (in ISO 3166-2, capitalized) members of the billing channel zone.
     *
     * @var list<string> $countries
     */
    #[Api(list: 'string')]
    public array $countries;

    #[Api]
    public string $name;

    /** @var value-of<RecordType> $recordType */
    #[Api('record_type', enum: RecordType::class)]
    public string $recordType;

    /**
     * ISO 8601 formatted date of when the channel zone was created.
     */
    #[Api('created_at', optional: true)]
    public ?string $createdAt;

    /**
     * ISO 8601 formatted date of when the channel zone was updated.
     */
    #[Api('updated_at', optional: true)]
    public ?string $updatedAt;

    /**
     * `new ChannelZoneUpdateResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ChannelZoneUpdateResponse::with(
     *   id: ..., channels: ..., countries: ..., name: ..., recordType: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ChannelZoneUpdateResponse)
     *   ->withID(...)
     *   ->withChannels(...)
     *   ->withCountries(...)
     *   ->withName(...)
     *   ->withRecordType(...)
     * ```
     */
    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<string> $countries
     * @param RecordType|value-of<RecordType> $recordType
     */
    public static function with(
        string $id,
        int $channels,
        array $countries,
        string $name,
        RecordType|string $recordType,
        ?string $createdAt = null,
        ?string $updatedAt = null,
    ): self {
        $obj = new self;

        $obj->id = $id;
        $obj->channels = $channels;
        $obj->countries = $countries;
        $obj->name = $name;
        $obj->recordType = $recordType instanceof RecordType ? $recordType->value : $recordType;

        null !== $createdAt && $obj->createdAt = $createdAt;
        null !== $updatedAt && $obj->updatedAt = $updatedAt;

        return $obj;
    }

    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    public function withChannels(int $channels): self
    {
        $obj = clone $this;
        $obj->channels = $channels;

        return $obj;
    }

    /**
     * List of countries (in ISO 3166-2, capitalized) members of the billing channel zone.
     *
     * @param list<string> $countries
     */
    public function withCountries(array $countries): self
    {
        $obj = clone $this;
        $obj->countries = $countries;

        return $obj;
    }

    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj->name = $name;

        return $obj;
    }

    /**
     * @param RecordType|value-of<RecordType> $recordType
     */
    public function withRecordType(RecordType|string $recordType): self
    {
        $obj = clone $this;
        $obj->recordType = $recordType instanceof RecordType ? $recordType->value : $recordType;

        return $obj;
    }

    /**
     * ISO 8601 formatted date of when the channel zone was created.
     */
    public function withCreatedAt(string $createdAt): self
    {
        $obj = clone $this;
        $obj->createdAt = $createdAt;

        return $obj;
    }

    /**
     * ISO 8601 formatted date of when the channel zone was updated.
     */
    public function withUpdatedAt(string $updatedAt): self
    {
        $obj = clone $this;
        $obj->updatedAt = $updatedAt;

        return $obj;
    }
}
