<?php

declare(strict_types=1);

namespace Telnyx\ShortCodes;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\ShortCode;
use Telnyx\ShortCode\RecordType;

/**
 * @phpstan-type ShortCodeUpdateResponseShape = array{data?: ShortCode|null}
 */
final class ShortCodeUpdateResponse implements BaseModel
{
    /** @use SdkModel<ShortCodeUpdateResponseShape> */
    use SdkModel;

    #[Optional]
    public ?ShortCode $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param ShortCode|array{
     *   messaging_profile_id: string|null,
     *   id?: string|null,
     *   country_code?: string|null,
     *   created_at?: \DateTimeInterface|null,
     *   record_type?: value-of<RecordType>|null,
     *   short_code?: string|null,
     *   tags?: list<string>|null,
     *   updated_at?: \DateTimeInterface|null,
     * } $data
     */
    public static function with(ShortCode|array|null $data = null): self
    {
        $obj = new self;

        null !== $data && $obj['data'] = $data;

        return $obj;
    }

    /**
     * @param ShortCode|array{
     *   messaging_profile_id: string|null,
     *   id?: string|null,
     *   country_code?: string|null,
     *   created_at?: \DateTimeInterface|null,
     *   record_type?: value-of<RecordType>|null,
     *   short_code?: string|null,
     *   tags?: list<string>|null,
     *   updated_at?: \DateTimeInterface|null,
     * } $data
     */
    public function withData(ShortCode|array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }
}
