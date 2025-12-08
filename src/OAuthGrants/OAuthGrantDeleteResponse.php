<?php

declare(strict_types=1);

namespace Telnyx\OAuthGrants;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\OAuthGrants\OAuthGrant\RecordType;

/**
 * @phpstan-type OAuthGrantDeleteResponseShape = array{data?: OAuthGrant|null}
 */
final class OAuthGrantDeleteResponse implements BaseModel
{
    /** @use SdkModel<OAuthGrantDeleteResponseShape> */
    use SdkModel;

    #[Optional]
    public ?OAuthGrant $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param OAuthGrant|array{
     *   id: string,
     *   client_id: string,
     *   created_at: \DateTimeInterface,
     *   record_type: value-of<RecordType>,
     *   scopes: list<string>,
     *   last_used_at?: \DateTimeInterface|null,
     * } $data
     */
    public static function with(OAuthGrant|array|null $data = null): self
    {
        $obj = new self;

        null !== $data && $obj['data'] = $data;

        return $obj;
    }

    /**
     * @param OAuthGrant|array{
     *   id: string,
     *   client_id: string,
     *   created_at: \DateTimeInterface,
     *   record_type: value-of<RecordType>,
     *   scopes: list<string>,
     *   last_used_at?: \DateTimeInterface|null,
     * } $data
     */
    public function withData(OAuthGrant|array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }
}
