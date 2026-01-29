<?php

declare(strict_types=1);

namespace Telnyx\Organizations\Users\UserGetGroupsReportResponse;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Organizations\Users\UserGetGroupsReportResponse\Data\UserStatus;
use Telnyx\Organizations\Users\UserGroupReference;

/**
 * An organization user with their group memberships always included.
 *
 * @phpstan-import-type UserGroupReferenceShape from \Telnyx\Organizations\Users\UserGroupReference
 *
 * @phpstan-type DataShape = array{
 *   id: string,
 *   createdAt: string,
 *   email: string,
 *   groups: list<UserGroupReference|UserGroupReferenceShape>,
 *   recordType: string,
 *   userStatus: UserStatus|value-of<UserStatus>,
 *   lastSignInAt?: string|null,
 *   organizationUserBypassesSSO?: bool|null,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    /**
     * Identifies the specific resource.
     */
    #[Required]
    public string $id;

    /**
     * ISO 8601 formatted date indicating when the resource was created.
     */
    #[Required('created_at')]
    public string $createdAt;

    /**
     * The email address of the user.
     */
    #[Required]
    public string $email;

    /**
     * The groups the user belongs to.
     *
     * @var list<UserGroupReference> $groups
     */
    #[Required(list: UserGroupReference::class)]
    public array $groups;

    /**
     * Identifies the type of the resource. Can be 'organization_owner' or 'organization_sub_user'.
     */
    #[Required('record_type')]
    public string $recordType;

    /**
     * The status of the account.
     *
     * @var value-of<UserStatus> $userStatus
     */
    #[Required('user_status', enum: UserStatus::class)]
    public string $userStatus;

    /**
     * ISO 8601 formatted date indicating when the resource last signed into the portal. Null if the user has never signed in.
     */
    #[Optional('last_sign_in_at', nullable: true)]
    public ?string $lastSignInAt;

    /**
     * Indicates whether this user is allowed to bypass SSO and use password authentication.
     */
    #[Optional('organization_user_bypasses_sso')]
    public ?bool $organizationUserBypassesSSO;

    /**
     * `new Data()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Data::with(
     *   id: ...,
     *   createdAt: ...,
     *   email: ...,
     *   groups: ...,
     *   recordType: ...,
     *   userStatus: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Data)
     *   ->withID(...)
     *   ->withCreatedAt(...)
     *   ->withEmail(...)
     *   ->withGroups(...)
     *   ->withRecordType(...)
     *   ->withUserStatus(...)
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
     * @param list<UserGroupReference|UserGroupReferenceShape> $groups
     * @param UserStatus|value-of<UserStatus> $userStatus
     */
    public static function with(
        string $id,
        string $createdAt,
        string $email,
        array $groups,
        string $recordType,
        UserStatus|string $userStatus = 'enabled',
        ?string $lastSignInAt = null,
        ?bool $organizationUserBypassesSSO = null,
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['createdAt'] = $createdAt;
        $self['email'] = $email;
        $self['groups'] = $groups;
        $self['recordType'] = $recordType;
        $self['userStatus'] = $userStatus;

        null !== $lastSignInAt && $self['lastSignInAt'] = $lastSignInAt;
        null !== $organizationUserBypassesSSO && $self['organizationUserBypassesSSO'] = $organizationUserBypassesSSO;

        return $self;
    }

    /**
     * Identifies the specific resource.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * ISO 8601 formatted date indicating when the resource was created.
     */
    public function withCreatedAt(string $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    /**
     * The email address of the user.
     */
    public function withEmail(string $email): self
    {
        $self = clone $this;
        $self['email'] = $email;

        return $self;
    }

    /**
     * The groups the user belongs to.
     *
     * @param list<UserGroupReference|UserGroupReferenceShape> $groups
     */
    public function withGroups(array $groups): self
    {
        $self = clone $this;
        $self['groups'] = $groups;

        return $self;
    }

    /**
     * Identifies the type of the resource. Can be 'organization_owner' or 'organization_sub_user'.
     */
    public function withRecordType(string $recordType): self
    {
        $self = clone $this;
        $self['recordType'] = $recordType;

        return $self;
    }

    /**
     * The status of the account.
     *
     * @param UserStatus|value-of<UserStatus> $userStatus
     */
    public function withUserStatus(UserStatus|string $userStatus): self
    {
        $self = clone $this;
        $self['userStatus'] = $userStatus;

        return $self;
    }

    /**
     * ISO 8601 formatted date indicating when the resource last signed into the portal. Null if the user has never signed in.
     */
    public function withLastSignInAt(?string $lastSignInAt): self
    {
        $self = clone $this;
        $self['lastSignInAt'] = $lastSignInAt;

        return $self;
    }

    /**
     * Indicates whether this user is allowed to bypass SSO and use password authentication.
     */
    public function withOrganizationUserBypassesSSO(
        bool $organizationUserBypassesSSO
    ): self {
        $self = clone $this;
        $self['organizationUserBypassesSSO'] = $organizationUserBypassesSSO;

        return $self;
    }
}
