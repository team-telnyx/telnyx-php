<?php

declare(strict_types=1);

namespace Telnyx\Organizations\Users;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Organizations\Users\UserListResponse\UserStatus;

/**
 * @phpstan-import-type UserGroupReferenceShape from \Telnyx\Organizations\Users\UserGroupReference
 *
 * @phpstan-type UserListResponseShape = array{
 *   id?: string|null,
 *   createdAt?: string|null,
 *   email?: string|null,
 *   groups?: list<UserGroupReference|UserGroupReferenceShape>|null,
 *   lastSignInAt?: string|null,
 *   organizationUserBypassesSSO?: bool|null,
 *   recordType?: string|null,
 *   userStatus?: null|UserStatus|value-of<UserStatus>,
 * }
 */
final class UserListResponse implements BaseModel
{
    /** @use SdkModel<UserListResponseShape> */
    use SdkModel;

    /**
     * Identifies the specific resource.
     */
    #[Optional]
    public ?string $id;

    /**
     * ISO 8601 formatted date indicating when the resource was created.
     */
    #[Optional('created_at')]
    public ?string $createdAt;

    /**
     * The email address of the user.
     */
    #[Optional]
    public ?string $email;

    /**
     * The groups the user belongs to. Only included when include_groups parameter is true.
     *
     * @var list<UserGroupReference>|null $groups
     */
    #[Optional(list: UserGroupReference::class)]
    public ?array $groups;

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
     * Identifies the type of the resource. Can be 'organization_owner' or 'organization_sub_user'.
     */
    #[Optional('record_type')]
    public ?string $recordType;

    /**
     * The status of the account.
     *
     * @var value-of<UserStatus>|null $userStatus
     */
    #[Optional('user_status', enum: UserStatus::class)]
    public ?string $userStatus;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<UserGroupReference|UserGroupReferenceShape>|null $groups
     * @param UserStatus|value-of<UserStatus>|null $userStatus
     */
    public static function with(
        ?string $id = null,
        ?string $createdAt = null,
        ?string $email = null,
        ?array $groups = null,
        ?string $lastSignInAt = null,
        ?bool $organizationUserBypassesSSO = null,
        ?string $recordType = null,
        UserStatus|string|null $userStatus = null,
    ): self {
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $createdAt && $self['createdAt'] = $createdAt;
        null !== $email && $self['email'] = $email;
        null !== $groups && $self['groups'] = $groups;
        null !== $lastSignInAt && $self['lastSignInAt'] = $lastSignInAt;
        null !== $organizationUserBypassesSSO && $self['organizationUserBypassesSSO'] = $organizationUserBypassesSSO;
        null !== $recordType && $self['recordType'] = $recordType;
        null !== $userStatus && $self['userStatus'] = $userStatus;

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
     * The groups the user belongs to. Only included when include_groups parameter is true.
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
}
