<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\MachinePayments\MachinePaymentAccountCreditParams;
use Telnyx\MachinePayments\MachinePaymentAccountCreditResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\MachinePaymentsRawContract;

/**
 * Machine payment (MPP) account-credit operations. Fund your Telnyx account programmatically from a machine or agent using the Machine Payment Protocol, an HTTP-402 flow settled via Stripe or Tempo.
 *
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class MachinePaymentsRawService implements MachinePaymentsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Creates an account credit using the Machine Payment Protocol (MPP), an HTTP-402 payment flow for machines and agents.
     *
     * The flow has two steps. First, send an authenticated request with the `amount_usd` to credit; the response is `402 Payment Required` with one or more payment challenges (for example separate Tempo and Stripe challenges) in the `WWW-Authenticate` header. Second, retry the request with an `Authorization: Payment ...` credential constructed from the challenge; on success the response includes the credited transaction and a `Payment-Receipt` header.
     *
     * The credited account is never chosen by the request body: the initial request credits the account of the authenticated user, and a paid retry credits the account bound to the verified payment credential. The amount must be within the configured bounds (by default between 5.00 and 500.00 USD).
     *
     * Successful paid retries are idempotent — when Rails reaches its duplicate-transaction lookup for an already-recorded payment, it returns the existing transaction with `created: false` instead of crediting the account again. This deduplication applies to successful fulfillment: re-sending the same Stripe credential may instead be rejected by the upstream provider as an idempotent replay and return `402 Payment Required` rather than the existing transaction.
     *
     * > **Warning: the payment credential is bound to a specific Telnyx account ID.** A payment is captured before the bound account is validated. If the credential names an account that is missing, suspended, blocked, cancelled, dormant, or ineligible for the tier, the payment is captured but **no account is credited**. If the credential names a different but eligible account, that account is credited — the service does not compare it against the payer's account. There is **no automatic refund**: if the captured payment does not credit the intended account, contact Telnyx support for remediation.
     *
     * @param array{amountUsd: string}|MachinePaymentAccountCreditParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<MachinePaymentAccountCreditResponse>
     *
     * @throws APIException
     */
    public function accountCredit(
        array|MachinePaymentAccountCreditParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = MachinePaymentAccountCreditParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'machine-payments/account-credit',
            body: (object) $parsed,
            options: $options,
            convert: MachinePaymentAccountCreditResponse::class,
        );
    }
}
