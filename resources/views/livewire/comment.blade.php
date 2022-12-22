<div>
    <div class="card-footer py-3 border-0" style="background-color: #f8f9fa;">
        <form wire:submit.prevent="AddComment">
            <div class="d-flex flex-start w-100">
                <img class="rounded-circle shadow-1-strong"
                     src="{{ asset('storage/profile_images/avatar.jpg') }}" alt="avatar" width="40"
                     height="40" style="margin-right: 20px"/>
                <div class="form-outline w-100">
                    <input  type="text" wire:model.lazy="newComment" class="form-control" rows="4"
                           style="background: #fff;"/>
                </div>
            </div>
            <div class="float-end mt-2 pt-1">
                <button type="button" class="btn btn-primary btn-sm">Post comment</button>
            </div>
        </form>


        <div class="row d-flex my-2 py-2">
            <div class="col-md-12 col-lg-12 col-xl-12">
                <div class="card">
                    <div class="card-body p-4">
                        @foreach($comments as $comment)
                            <div class="row py-2">
                                <div class="col">
                                    <div class="d-flex flex-start">
                                        <img class="rounded-circle shadow-1-strong me-3"
                                             src="{{ asset('storage/profile_images/avatar.jpg') }}"
                                             alt="avatar"
                                             width="65"
                                             height="65"/>
                                        <div class="flex-grow-1 flex-shrink-1">
                                            <div class="mx-4">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <p class="mb-1">
                                                        {{ $comment['author'] }} <span
                                                            class="small">- {{ $comment['created_at'] }}</span>
                                                    </p>
                                                </div>
                                                <p class="small mb-0">
                                                    {{ $comment['content'] }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
