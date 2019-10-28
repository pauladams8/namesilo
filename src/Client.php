<?php

namespace PaulAdams\Namesilo;

use Dashboard\Services\Namesilo\Client\HttpClient;
use Dashboard\Services\Namesilo\Response\Response;

/**
 * Class Client
 *
 * @method Response registerDomain(array $parameters) Register a new domain
 *         name
 * @method Response registerDomainDrop(array $parameters) Register a new domain
 *         name using drop-catching
 * @method Response renewDomain(array $parameters) Renew a domain name
 * @method Response transferDomain(array $parameters) Transfer a domain name
 *         into your NameSilo account
 * @method Response checkTransferStatus(array $parameters) Check the status of
 *         a domain transfer
 * @method Response transferUpdateChangeEPPCode(array $parameters) Add/Change
 *         the EPP code for a domain transfer
 * @method Response transferUpdateResendAdminEmail(array $parameters) Update a
 *         Transfer to Re-Send the Admin Verification Email
 * @method Response transferUpdateResubmitToRegistry(array $parameters) Update
 *         a Transfer to Re-Submit the transfer to the registry
 * @method Response checkRegisterAvailability(array $parameters) Determine if
 *         up to 200 domains can be registered at this time
 * @method Response checkTransferAvailability(array $parameters) Determine if
 *         up to 200 domains can be transferred into your account at this time
 * @method Response listDomains(array $parameters) A list of all active domains
 *         within your account
 * @method Response getDomainInfo(array $parameters) Get essential information
 *         on a domain within your account
 * @method Response contactList(array $parameters) View all contact profiles in
 *         your account
 * @method Response contactAdd(array $parameters) Add a contact profile to your
 *         account
 * @method Response contactUpdate(array $parameters) Update a contact profile
 *         in account
 * @method Response contactDelete(array $parameters) Delete a contact profile
 *         in account
 * @method Response contactDomainAssociate(array $parameters) Associate contact
 *         profiles with a domain
 * @method Response changeNameServers(array $parameters) Change the NameServers
 *         for up to 200 domains
 * @method Response dnsListRecords(array $parameters) View all DNS records
 *         associated with your domain
 * @method Response dnsAddRecord(array $parameters) Add a new DNS resource
 *         record
 * @method Response dnsUpdateRecord(array $parameters) Update an existing DNS
 *         resource record
 * @method Response dnsDeleteRecord(array $parameters) Delete an existing DNS
 *         resource record
 * @method Response dnsSecListRecords(array $parameters) View all DS (DNSSEC)
 *         records associated with your domain
 * @method Response dnsSecAddRecord(array $parameters) Add a DS record (DNSSEC)
 *         to your domain
 * @method Response dnsSecDeleteRecord(array $parameters) Delete a DS record
 *         (DNSSEC) from your domain
 * @method Response portfolioList(array $parameters) List the active portfolios
 *         within your account
 * @method Response portfolioAdd(array $parameters) Add a portfolio to your
 *         account
 * @method Response portfolioDelete(array $parameters) Delete a portfolio from
 *         your account
 * @method Response portfolioDomainAssociate(array $parameters) Add up to 200
 *         domains to a portfolio
 * @method Response listRegisteredNameServers(array $parameters) List the
 *         Registered NameServers associated with one of your domains
 * @method Response addRegisteredNameServer(array $parameters) Add a Registered
 *         NameServer for one of your domains
 * @method Response modifyRegisteredNameServer(array $parameters) Modify a
 *         Registered NameServer
 * @method Response deleteRegisteredNameServer(array $parameters) Delete a
 *         Registered NameServer
 * @method Response addPrivacy(array $parameters) Add WHOIS Privacy to a domain
 * @method Response removePrivacy(array $parameters) Remove WHOIS Privacy from
 *         a domain
 * @method Response addAutoRenewal(array $parameters) Set your domain to be
 *         auto-renewed
 * @method Response removeAutoRenewal(array $parameters) Remove the
 *         auto-renewal setting from your domain
 * @method Response retrieveAuthCode(array $parameters) Have the EPP
 *         authorization code for the domain emailed to the administrative
 *         contact
 * @method Response domainForward(array $parameters) Forward your domain
 * @method Response domainForwardSubDomain(array $parameters) Forward a
 *         sub-domain
 * @method Response domainForwardSubDomainDelete(array $parameters) Delete a
 *         sub-domain forward
 * @method Response domainLock(array $parameters) Lock your domain
 * @method Response domainUnlock(array $parameters) Unlock your domain
 * @method Response listEmailForwards(array $parameters) List all email
 *         forwards for your domain
 * @method Response configureEmailForward(array $parameters) Add or modify an
 *         email forward for your domain
 * @method Response deleteEmailForward(array $parameters) Delete an email
 *         forward for your domain
 * @method Response registrantVerificationStatus(array $parameters) See the
 *         verification status of any Registrant email addresses
 * @method Response emailVerification(array $parameters) Verify a Registrant
 *         email address
 * @method Response getAccountBalance(array $parameters) View your NameSilo
 *         account funds balance
 * @method Response addAccountFunds(array $parameters) Increase your NameSilo
 *         account funds
 * @method Response marketplaceActiveSalesOverview(array $parameters) Returns a
 *         list and specifics for all of your active Marketplace sales
 * @method Response marketplaceAddOrModifySale(array $parameters) Allows you to
 *         add a new Marketplace sale or modify and existing sale
 * @method Response marketplaceLandingPageUpdate(array $parameters) Allows you
 *         to update the appearance of your Marketplace Landing Page
 * @method Response getPrices(array $parameters) Returns our price list
 *         customized optionally based upon your account's specific pricing
 * @method Response listOrders(array $parameters) Returns a list of all orders
 *         placed in your account
 * @method Response orderDetails(array $parameters) Provides details for the
 *         provided order number
 */
class Client
{
    protected $client;
    
    public function __construct(HttpClient $client)
    {
        $this->client = $client;
    }
    
    /**
     * Magic method to call API endpoint.
     *
     * @param       $name
     * @param array $parameters
     *
     * @return Response
     * @throws Exceptions\HttpClientException
     */
    public function __call($name, array $parameters = [])
    {
        return $this->request($name, $parameters);
    }
    
    /**
     * Send a request.
     *
     * @param $endpoint
     * @param $parameters
     *
     * @return Response
     * @throws Exceptions\HttpClientException
     */
    protected function request($endpoint, $parameters)
    {
        return $this->client->request($endpoint, $parameters);
    }
}
