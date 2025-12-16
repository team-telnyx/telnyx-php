<?php

declare(strict_types=1);

namespace Telnyx\CustomerServiceRecords;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type CustomerServiceRecordShape from \Telnyx\CustomerServiceRecords\CustomerServiceRecord
 *
 * @phpstan-type CustomerServiceRecordNewResponseShape = array{
 *   data?: null|CustomerServiceRecord|CustomerServiceRecordShape
 * }
 */
final class CustomerServiceRecordNewResponse implements BaseModel
{
    /** @use SdkModel<CustomerServiceRecordNewResponseShape> */
    use SdkModel;

    #[Optional]
    public ?CustomerServiceRecord $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param CustomerServiceRecordShape $data
     */
    public static function with(CustomerServiceRecord|array|null $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param CustomerServiceRecordShape $data
     */
    public function withData(CustomerServiceRecord|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
