<?php

declare(strict_types=1);

namespace Telnyx\CustomerServiceRecords\CustomerServiceRecordListParams\Filter;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type PhoneNumberShape = array{eq?: string|null, in?: list<string>|null}
 */
final class PhoneNumber implements BaseModel
{
    /** @use SdkModel<PhoneNumberShape> */
    use SdkModel;

    /**
     * Filters records to those with a specified number.
     */
    #[Optional]
    public ?string $eq;

    /**
     * Filters records to those with at least one number in the list.
     *
     * @var list<string>|null $in
     */
    #[Optional(list: 'string')]
    public ?array $in;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<string> $in
     */
    public static function with(?string $eq = null, ?array $in = null): self
    {
        $obj = new self;

        null !== $eq && $obj['eq'] = $eq;
        null !== $in && $obj['in'] = $in;

        return $obj;
    }

    /**
     * Filters records to those with a specified number.
     */
    public function withEq(string $eq): self
    {
        $obj = clone $this;
        $obj['eq'] = $eq;

        return $obj;
    }

    /**
     * Filters records to those with at least one number in the list.
     *
     * @param list<string> $in
     */
    public function withIn(array $in): self
    {
        $obj = clone $this;
        $obj['in'] = $in;

        return $obj;
    }
}
