<?php

declare(strict_types=1);

namespace Telnyx\BundlePricing\UserBundles;

use Telnyx\BundlePricing\BillingBundles\BillingBundleSummary;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type UserBundleGetResponseShape = array{data: UserBundle}
 */
final class UserBundleGetResponse implements BaseModel
{
    /** @use SdkModel<UserBundleGetResponseShape> */
    use SdkModel;

    #[Required]
    public UserBundle $data;

    /**
     * `new UserBundleGetResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * UserBundleGetResponse::with(data: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new UserBundleGetResponse)->withData(...)
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
     * @param UserBundle|array{
     *   id: string,
     *   active: bool,
     *   billingBundle: BillingBundleSummary,
     *   createdAt: \DateTimeInterface,
     *   resources: list<UserBundleResource>,
     *   userID: string,
     *   updatedAt?: \DateTimeInterface|null,
     * } $data
     */
    public static function with(UserBundle|array $data): self
    {
        $self = new self;

        $self['data'] = $data;

        return $self;
    }

    /**
     * @param UserBundle|array{
     *   id: string,
     *   active: bool,
     *   billingBundle: BillingBundleSummary,
     *   createdAt: \DateTimeInterface,
     *   resources: list<UserBundleResource>,
     *   userID: string,
     *   updatedAt?: \DateTimeInterface|null,
     * } $data
     */
    public function withData(UserBundle|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
