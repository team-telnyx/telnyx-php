<?php

declare(strict_types=1);

namespace Telnyx\CredentialConnections\Actions;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkResponse;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\Contracts\ResponseConverter;
use Telnyx\CredentialConnections\Actions\ActionCheckRegistrationStatusResponse\Data;
use Telnyx\CredentialConnections\Actions\ActionCheckRegistrationStatusResponse\Data\Status;

/**
 * @phpstan-type ActionCheckRegistrationStatusResponseShape = array{
 *   data?: Data|null
 * }
 */
final class ActionCheckRegistrationStatusResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<ActionCheckRegistrationStatusResponseShape> */
    use SdkModel;

    use SdkResponse;

    #[Api(optional: true)]
    public ?Data $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Data|array{
     *   ip_address?: string|null,
     *   last_registration?: string|null,
     *   port?: int|null,
     *   record_type?: string|null,
     *   sip_username?: string|null,
     *   status?: value-of<Status>|null,
     *   transport?: string|null,
     *   user_agent?: string|null,
     * } $data
     */
    public static function with(Data|array|null $data = null): self
    {
        $obj = new self;

        null !== $data && $obj['data'] = $data;

        return $obj;
    }

    /**
     * @param Data|array{
     *   ip_address?: string|null,
     *   last_registration?: string|null,
     *   port?: int|null,
     *   record_type?: string|null,
     *   sip_username?: string|null,
     *   status?: value-of<Status>|null,
     *   transport?: string|null,
     *   user_agent?: string|null,
     * } $data
     */
    public function withData(Data|array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }
}
