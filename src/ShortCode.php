<?php

declare(strict_types=1);

namespace Telnyx;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\ShortCode\RecordType;

/**
 * @phpstan-type ShortCodeShape = array{
 *   messaging_profile_id: string|null,
 *   id?: string|null,
 *   country_code?: string|null,
 *   created_at?: \DateTimeInterface|null,
 *   record_type?: value-of<RecordType>|null,
 *   short_code?: string|null,
 *   tags?: list<string>|null,
 *   updated_at?: \DateTimeInterface|null,
 * }
 */
final class ShortCode implements BaseModel
{
    /** @use SdkModel<ShortCodeShape> */
    use SdkModel;

    /**
     * Unique identifier for a messaging profile.
     */
    #[Required]
    public ?string $messaging_profile_id;

    /**
     * Identifies the type of resource.
     */
    #[Optional]
    public ?string $id;

    /**
     * ISO 3166-1 alpha-2 country code.
     */
    #[Optional]
    public ?string $country_code;

    /**
     * ISO 8601 formatted date indicating when the resource was created.
     */
    #[Optional]
    public ?\DateTimeInterface $created_at;

    /**
     * Identifies the type of the resource.
     *
     * @var value-of<RecordType>|null $record_type
     */
    #[Optional(enum: RecordType::class)]
    public ?string $record_type;

    /**
     * Short digit sequence used to address messages.
     */
    #[Optional]
    public ?string $short_code;

    /** @var list<string>|null $tags */
    #[Optional(list: 'string')]
    public ?array $tags;

    /**
     * ISO 8601 formatted date indicating when the resource was updated.
     */
    #[Optional]
    public ?\DateTimeInterface $updated_at;

    /**
     * `new ShortCode()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ShortCode::with(messaging_profile_id: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ShortCode)->withMessagingProfileID(...)
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
     * @param RecordType|value-of<RecordType> $record_type
     * @param list<string> $tags
     */
    public static function with(
        ?string $messaging_profile_id,
        ?string $id = null,
        ?string $country_code = null,
        ?\DateTimeInterface $created_at = null,
        RecordType|string|null $record_type = null,
        ?string $short_code = null,
        ?array $tags = null,
        ?\DateTimeInterface $updated_at = null,
    ): self {
        $obj = new self;

        $obj['messaging_profile_id'] = $messaging_profile_id;

        null !== $id && $obj['id'] = $id;
        null !== $country_code && $obj['country_code'] = $country_code;
        null !== $created_at && $obj['created_at'] = $created_at;
        null !== $record_type && $obj['record_type'] = $record_type;
        null !== $short_code && $obj['short_code'] = $short_code;
        null !== $tags && $obj['tags'] = $tags;
        null !== $updated_at && $obj['updated_at'] = $updated_at;

        return $obj;
    }

    /**
     * Unique identifier for a messaging profile.
     */
    public function withMessagingProfileID(?string $messagingProfileID): self
    {
        $obj = clone $this;
        $obj['messaging_profile_id'] = $messagingProfileID;

        return $obj;
    }

    /**
     * Identifies the type of resource.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj['id'] = $id;

        return $obj;
    }

    /**
     * ISO 3166-1 alpha-2 country code.
     */
    public function withCountryCode(string $countryCode): self
    {
        $obj = clone $this;
        $obj['country_code'] = $countryCode;

        return $obj;
    }

    /**
     * ISO 8601 formatted date indicating when the resource was created.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj['created_at'] = $createdAt;

        return $obj;
    }

    /**
     * Identifies the type of the resource.
     *
     * @param RecordType|value-of<RecordType> $recordType
     */
    public function withRecordType(RecordType|string $recordType): self
    {
        $obj = clone $this;
        $obj['record_type'] = $recordType;

        return $obj;
    }

    /**
     * Short digit sequence used to address messages.
     */
    public function withShortCode(string $shortCode): self
    {
        $obj = clone $this;
        $obj['short_code'] = $shortCode;

        return $obj;
    }

    /**
     * @param list<string> $tags
     */
    public function withTags(array $tags): self
    {
        $obj = clone $this;
        $obj['tags'] = $tags;

        return $obj;
    }

    /**
     * ISO 8601 formatted date indicating when the resource was updated.
     */
    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $obj = clone $this;
        $obj['updated_at'] = $updatedAt;

        return $obj;
    }
}
