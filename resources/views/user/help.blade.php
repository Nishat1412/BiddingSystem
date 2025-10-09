@extends('user.app')
@section('title') Help @endsection

@section('content1')



<div class="help-container">
    <div class="help-header">
        <h2>Help & Support</h2>
        <p>Here are answers to some of our most frequently asked questions.</p>
    </div>

    <div id="faqAccordion">

        {{-- Bidders Section --}}
        <div class="faq-section">
            <h4><i class="fas fa-gavel"></i> For Bidders</h4>
            <div class="card mb-2">
                <div class="card-header" id="headingOne">
                    <h5 class="mb-0">
                        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                            How do I place a bid?
                        </button>
                    </h5>
                </div>
                <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#faqAccordion">
                    <div class="card-body">
                        To place a bid, you must be logged into your account. Navigate to the product you're interested in, enter your bid amount in the designated box (it must be higher than the current bid), and click the "Submit Bid" button.
                    </div>
                </div>
            </div>

            
             <div class="card mb-2">
                <div class="card-header" id="headingThree">
                    <h5 class="mb-0">
                        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                           How do I know if I've won an auction?
                        </button>
                    </h5>
                </div>
                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#faqAccordion">
                    <div class="card-body">
                       If you are the highest bidder when the auction timer ends, you will be declared the winner. You will receive an email notification with details on the next steps, including how to contact the seller.
                    </div>
                </div>
            </div>
             <div class="card mb-2">
                <div class="card-header" id="headingFour">
                    <h5 class="mb-0">
                        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                           Can I cancel a bid?
                        </button>
                    </h5>
                </div>
                <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#faqAccordion">
                    <div class="card-body">
                        Once a bid is placed, it is considered a binding commitment to buy the item if you win. Bids cannot be canceled, so please bid carefully.
                    </div>
                </div>
            </div>
        </div>

        {{-- Sellers Section --}}
        <div class="faq-section">
            <h4><i class="fas fa-tag"></i> For Sellers</h4>
            <div class="card mb-2">
                <div class="card-header" id="headingFive">
                    <h5 class="mb-0">
                        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                            How do I list a product for auction?
                        </button>
                    </h5>
                </div>
                <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#faqAccordion">
                    <div class="card-body">
                        After logging in, go to your dashboard and click "Add New Product." You will need to fill out the product details, including its name, category, starting price, upload clear images, and provide a cash memo for verification.
                    </div>
                </div>
            </div>
             <div class="card mb-2">
                <div class="card-header" id="headingSix">
                    <h5 class="mb-0">
                        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                           What is the "Pending Approval" status?
                        </button>
                    </h5>
                </div>
                <div id="collapseSix" class="collapse" aria-labelledby="headingSix" data-parent="#faqAccordion">
                    <div class="card-body">
                       After you submit a new product, our admin team reviews it to ensure it meets our standards. During this time, its status will be "Pending Approval." This process is usually completed within 24 hours.
                    </div>
                </div>
            </div>
        </div>

        {{-- General Section --}}
        <div class="faq-section">
            <h4><i class="fas fa-info-circle"></i> General Questions</h4>
             <div class="card mb-2">
                <div class="card-header" id="headingSeven">
                    <h5 class="mb-0">
                        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                           Is this platform secure?
                        </button>
                    </h5>
                </div>
                <div id="collapseSeven" class="collapse" aria-labelledby="headingSeven" data-parent="#faqAccordion">
                    <div class="card-body">
                      Yes. We take your security and privacy seriously. All user data, including passwords and personal documents, is encrypted and stored securely.
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="contact-support">
        <p><strong>Still have questions?</strong></p>
        <p>If your question isn't answered here, please contact us at <a href="mailto:support@bidmaster.com">support@bidmaster.com</a>.</p>
    </div>

</div>

@endsection
