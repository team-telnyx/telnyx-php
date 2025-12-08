<?php

declare(strict_types=1);

namespace Telnyx\SimCards\Actions;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\SimCards\Actions\ActionValidateRegistrationCodesResponse\Data;

/**
 * @phpstan-type ActionValidateRegistrationCodesResponseShape = array{
 *   data?: list<Data>|null
 * }
 */
final class ActionValidateRegistrationCodesResponse implements BaseModel
{
    /** @use SdkModel<ActionValidateRegistrationCodesResponseShape> */
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
     *   invalid_detail?: string|null,
     *   record_type?: string|null,
     *   registration_code?: string|null,
     *   valid?: bool|null,
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
     *   invalid_detail?: string|null,
     *   record_type?: string|null,
     *   registration_code?: string|null,
     *   valid?: bool|null,
     * }> $data
     */
    public function withData(array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }
}
