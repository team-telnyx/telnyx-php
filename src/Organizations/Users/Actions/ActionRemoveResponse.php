<?php

declare(strict_types=1);

namespace Telnyx\Organizations\Users\Actions;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Organizations\Users\OrganizationUser;

/**
 * @phpstan-import-type OrganizationUserShape from \Telnyx\Organizations\Users\OrganizationUser
 *
 * @phpstan-type ActionRemoveResponseShape = array{
 *   data?: null|OrganizationUser|OrganizationUserShape
 * }
 */
final class ActionRemoveResponse implements BaseModel
{
    /** @use SdkModel<ActionRemoveResponseShape> */
    use SdkModel;

    #[Optional]
    public ?OrganizationUser $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param OrganizationUser|OrganizationUserShape|null $data
     */
    public static function with(OrganizationUser|array|null $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param OrganizationUser|OrganizationUserShape $data
     */
    public function withData(OrganizationUser|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
