<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders\PhoneNumberConfigurations;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PortingOrders\PhoneNumberConfigurations\PhoneNumberConfigurationNewResponse\Data;

/**
 * @phpstan-type PhoneNumberConfigurationNewResponseShape = array{
 *   data?: list<Data>|null
 * }
 */
final class PhoneNumberConfigurationNewResponse implements BaseModel
{
    /** @use SdkModel<PhoneNumberConfigurationNewResponseShape> */
    use SdkModel;

    /** @var list<Data>|null $data */
    #[Api(list: Data::class, optional: true)]
    public ?array $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<Data|array{
     *   id?: string|null,
     *   created_at?: \DateTimeInterface|null,
     *   porting_phone_number_id?: string|null,
     *   record_type?: string|null,
     *   updated_at?: \DateTimeInterface|null,
     *   user_bundle_id?: string|null,
     * }> $data
     */
    public static function with(?array $data = null): self
    {
        $obj = new self;

        null !== $data && $obj['data'] = $data;

        return $obj;
    }

    /**
     * @param list<Data|array{
     *   id?: string|null,
     *   created_at?: \DateTimeInterface|null,
     *   porting_phone_number_id?: string|null,
     *   record_type?: string|null,
     *   updated_at?: \DateTimeInterface|null,
     *   user_bundle_id?: string|null,
     * }> $data
     */
    public function withData(array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }
}
