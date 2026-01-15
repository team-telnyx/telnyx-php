<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\ServiceContracts\OrganizationsContract;
use Telnyx\Services\Organizations\UsersService;

final class OrganizationsService implements OrganizationsContract
{
    /**
     * @api
     */
    public OrganizationsRawService $raw;

    /**
     * @api
     */
    public UsersService $users;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new OrganizationsRawService($client);
        $this->users = new UsersService($client);
    }
}
